<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['product_detail']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $products = Products::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $products = Products::where('name','!=','')->paginate($perPage);
        }
        
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $requestData = $request->all();
        Products::create($requestData);

        return redirect('products')->with('alert-success', 'Product added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        
        $requestData = $request->all();

        $product = Products::findOrFail($id);
        $product->update($requestData);
        
        return redirect('products')->with('alert-success', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::destroy($id);
        return redirect('products')->with('alert-success', 'Product deleted!');
    }

    public function add_picture($id)
    {
        $product = Products::findOrFail($id);
        $dataImage = Self::getProductImageData($id);
        return view('products.add_picture', compact('product','dataImage'));
    }

    public function store_picture(Request $request)
    {
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        if($request->hasfile('filename'))
         {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/img/products', $name);  

                DB::insert("INSERT INTO product_images VALUES(null,'$request->id_product', '$name', '0', NOW(), NOW());");
            }
         }
         
        return back()->with('alert-success', 'Your images has been successfully uploaded');
    }

    public function getProductImageData($id_product){
        $getData = DB::select("SELECT * FROM product_images WHERE id_product = " . $id_product);
        return $getData;
    }

    public function setMainImage($id_product){
        $id_product_image = $_POST['id'];
        DB::statement("UPDATE product_images SET main_image = 0 where id_product = " . $id_product);
        DB::statement("UPDATE product_images SET main_image = 1 where id = " . $id_product_image);

        return 'success';
    }

    public function product_detail($id_product){
        $product            = Products::findOrFail($id_product);
        $product_images     = DB::select("SELECT * FROM product_images WHERE id_product = " . $id_product);

        $id_user_login = isset(Auth::user()->id)?Auth::user()->id:0;
        return view('products.product_detail', compact('product','product_images','id_user_login'));
    }
}
