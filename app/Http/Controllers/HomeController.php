<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Auth;

use Midtrans;
use Veritrans;
use Redirect;

use App\Traits\Home;

class HomeController extends Controller
{
    use Home;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    private $id_user;


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // Save transaction start from here
        $data               = $request->all();
        if(!empty($data['order_id']) AND isset(Auth::user()->id)){
            $data['id_user']    = Auth::user()->id;
            $data['created_at'] = date('Y-m-d H:i:s');
    
            if(self::saveTransaction($data)){
                //self::sendEmail($data); Buat segera fungsi send email setelah pembayaran berhasil, dan halaman history pembelian
                // disini harusnya informasikan bahwa pembelian telah berhasil, cek email atau redirect ke halaman after order
                // return redirect('/home?msg=Pembelian anda telah berhasil, harap cek email anda untuk mendapatkan pembelian anda'); 
                return redirect('/cart_history'); 

            }
        }
        // End save transaction

        $keyword = $request->get('search');
        if(!empty($keyword)){
            $product = DB::table('products')
            ->join('product_images', function($join){
                $join->on('product_images.id_product', '=', 'products.id')
                ->where('product_images.main_image','=','1');

            })
            ->where('name','like','%'.$keyword.'%')
            ->orWhere('category','like','%'.$keyword.'%')
            ->groupBy('id_product')
            ->orderBy('products.created_at','desc')
            ->select('products.*','product_images.filename', 'product_images.id_product')
            ->get();
        }else{
            $product = DB::table('products')
            ->join('product_images', function($join){
                $join->on('product_images.id_product', '=', 'products.id')
                ->where('product_images.main_image','=','1');

            })
            ->groupBy('id_product')
            ->orderBy('products.created_at','desc')
            ->select('products.*','product_images.filename', 'product_images.id_product')
            ->get();
        }

        $id_user_login = isset(Auth::user()->id)?Auth::user()->id:0;
        return view('home', compact('product','id_user_login'));
    }

    public function indexNeedLogin(Request $request){
        return redirect('/home');
    }

    public function cart_detail(){
        $id_user        = Auth::user()->id;
        $get_products = DB::select("
            SELECT 
                sum(carts.qty) qty_order, 
                avg(unit_price) unit_price,
                sum(total_price) total_price, 
                products.id,
                products.name,
                products.qty,
                products.price,
                products.rating,
                products.category,
                product_images.filename
            FROM carts
            INNER JOIN products
            ON products.id = carts.id_product
            INNER JOIN product_images
            ON product_images.id_product = products.id AND main_image = 1
            WHERE id_user = '$id_user' AND status = 'unpaid'
            GROUP BY carts.id_product, carts.unit_price

            UNION

            SELECT 
                sum(carts.qty) qty_order, 
                avg(unit_price) unit_price,
                sum(total_price) total_price, 
                trainings.id,
                trainings.name,
                1 as qty, 
                trainings.price,
                trainings.rating,
                trainings.category,
                trainings.image filename
            FROM carts
            INNER JOIN trainings ON trainings.id = carts.id_training
            WHERE id_user = '$id_user' AND status = 'unpaid'
            GROUP BY carts.id_training, carts.unit_price

            UNION

            SELECT 
                sum(carts.qty) qty_order, 
                avg(unit_price) unit_price,
                sum(total_price) total_price, 
                ebooks.id,
                ebooks.name,
                1 as qty, 
                ebooks.price,
                ebooks.rating,
                ebooks.category,
                ebooks.image filename
            FROM carts
            INNER JOIN ebooks ON ebooks.id = carts.id_ebook
            WHERE id_user = '$id_user' AND status = 'unpaid'
            GROUP BY carts.id_ebook, carts.unit_price


        ");
        return view('cart/cart_detail', compact('get_products'));
    }

    public function cart_history(){
        $id_user        = Auth::user()->id;
        $getTransaction = DB::select("
            SELECT * FROM t_transaction 
            WHERE id_user = '$id_user' AND status_code = 200 
            ORDER BY id DESC
        ");

        return view('cart/cart_history', compact('getTransaction'));
    }

    public function cart_history_detail(){
        $order_id               = isset($_GET['id_order'])?$_GET['id_order']:'';
        $getTransaction         = DB::select("SELECT * FROM t_transaction WHERE order_id = '$order_id' ");
        $getTransactionApps     = DB::select("
            SELECT
                c.*,
                p.name
            FROM carts c
            INNER JOIN products p ON p.id = c.id_product
            WHERE c.order_id = '$order_id' 
        ");

        $getTransactionTrainings     = DB::select("
            SELECT
                c.*,
                t.name
            FROM carts c
            INNER JOIN trainings t ON t.id = c.id_training
            WHERE c.order_id = '$order_id' 
        ");

        $getTransactionEbooks     = DB::select("
            SELECT
                c.*,
                e.name,
                e.url_show,
                e.url_download
            FROM carts c
            INNER JOIN ebooks e ON e.id = c.id_ebook
            WHERE c.order_id = '$order_id' 
        ");

        return view('cart/cart_history_detail', compact('getTransaction','getTransactionApps','getTransactionTrainings','getTransactionEbooks'));
    }

    public function addProductToChart(){
        $id_product     = $_POST['id_product'];
        $qty            = 1;
        $unit_price     = $_POST['unit_price'];
        $total_price    = $qty * $unit_price;
        $id_user        = Auth::user()->id;

        // disini perintah insert product jika belum ada, dan tambah qty jika sudah ada ditable
        DB::statement("
            INSERT INTO carts(id,id_user,id_product,qty,unit_price,total_price,created_at,updated_at) 
            VALUES('','$id_user','$id_product','$qty','$unit_price', '$total_price', NOW(), NOW());
        ");

        $total_belanja = Self::getTotalBelanja();

        $response = array('status' => 'success', 'total_belanja'    => $total_belanja);

        return json_encode($response);
    }
    
    public function deleteProductFromCart($id_product){
        $id_user        = Auth::user()->id;

        DB::statement("
            DELETE FROM carts 
            WHERE 
                (id_product = '$id_product' AND id_user = '$id_user' AND status = 'unpaid' AND id_product <> 0)
                OR
                (id_training = '$id_product' AND id_user = '$id_user' AND status = 'unpaid' AND id_training <> 0)
                OR
                (id_ebook = '$id_product' AND id_user = '$id_user' AND status = 'unpaid' AND id_ebook <> 0)
        ");
        
        return 'deleted';
    }

    public function payment_midrans_get_token(){
        $transaction_details = [
            'order_id'      => 'CL00002',
            'gross_amount'  => 7000000
        ];
        
        $customer_details = [
            'first_name' => 'Kode',
            'email' => 'kodekite@gmail.com',
            'phone' => '081384880626'
        ];
        
        $custom_expiry = [
            'start_time' => date("Y-m-d H:i:s O", time()),
            'unit' => 'day',
            'duration' => 2
        ];
        
        $item_details = [
            'id' => '1',
            'quantity' => 1,
            'name' => 'Frexor KPIM penilaian karyawan',
            'price' => 7000000
        ];

        // Send this options if you use 3Ds in credit card request
        $credit_card_option = [
            'secure' => true, 
            'channel' => 'migs'
        ];

        $transaction_data = [
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details,
            'expiry' => $custom_expiry,
            'credit_card' => $credit_card_option,
        ];

        $token = Midtrans::getSnapToken($transaction_data);
        return $token;
    }

    public function payment() {
        $total_bayar = isset($_GET['axjokototaydonoloyokintillekiawjembetiawlexiongdonotchangehero'])?$_GET['axjokototaydonoloyokintillekiawjembetiawlexiongdonotchangehero']:0;
        $total_bayar = Self::dec_enc('decrypt', $total_bayar);

        $orderId     = date('ymdHis').time();

        if($total_bayar == 0){
            $urlZeroTotal = url('home').'?order_id='.$orderId;
            return Redirect::to($urlZeroTotal);
        }
        
        $transaction_details = [
            'order_id'      => $orderId,
            'gross_amount'  => $total_bayar
        ];
        
        $customer_details = [
            'first_name' => 'Kode Kite',
            'email' => 'kodekite@gmail.com',
            'phone' => '081384880626'
        ];
        
        $custom_expiry = [
            'start_time' => date("Y-m-d H:i:s O", time()),
            'unit' => 'day',
            'duration' => 2
        ];
        
        $item_details = 
        [
            [
                'id' => '1',
                'price' => 2000000,
                'quantity' => 1,
                'name' => 'Frexor KPIM Automation software',
                'brand'  => 'Codelapak',
                'category'  => 'Codelapak Apps'
            ],
            [
                'id' => '2',
                'price' => 7500000,
                'quantity' => 1,
                'name' => 'Frexor KPIM Automation software 2',
                'brand'  => 'Codelapak',
                'category'  => 'Codelapak Training'
            ],
        ];

        $transaction_data = [
            'payment_type' => 'vtweb',
            'vtweb' => [
                'credit_card_3d_secure' => true
            ],
            'transaction_details' => $transaction_details,
            'item_details' => json_encode($item_details),
            'customer_details' => $customer_details
        ];

        $redirect_url = Veritrans::vtwebCharge($transaction_data);
        return Redirect::to($redirect_url);
    }

    function dec_enc($action, $string) {
        $output = false;
     
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'This is my secret key';
        $secret_iv = 'This is my secret iv';
     
        // hash
        $key = hash('sha256', $secret_key);
        
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
     
        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
     
        return $output;
    }

    public function saveTransaction($data){
        $id_order               = $data['order_id'];
        $status_code            = isset($data['status_code'])?$data['status_code']:'200';
        $transaction_status     = isset($data['transaction_status'])?$data['transaction_status']:'Zero Transaction';
        $id_user                = $data['id_user'];
        $created_at             = $data['created_at'];

        try{
            DB::statement("
                INSERT INTO t_transaction(id,order_id,status_code,transaction_status,id_user,created_at) 
                VALUES('','$id_order','$status_code','$transaction_status', '$id_user', '$created_at');
            ");

            return true;

        }catch(Exception $e){
            return false;
        }
    }
}

?>