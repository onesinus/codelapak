<?php

namespace App\Http\Controllers;

use App\Ebooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Traits\Home;


class EbooksController extends Controller
{
    use Home; // Call trait in HomeController, so i can access method inside trait

    public function __construct()
    {
       $this->middleware('auth', ['only' => 'NeedLogin']);
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
            $ebooks = Ebooks::where('name', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ebooks = Ebooks::where('name','!=','')->paginate($perPage);
        }
        
        $id_user_login = isset(Auth::user()->id)?Auth::user()->id:0;

        return view('ebooks/index', compact('ebooks','id_user_login'));
    }

    public function NeedLogin(){
        return redirect('/ebooks');
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ebooks  $ebooks
     * @return \Illuminate\Http\Response
     */
    public function show(Ebooks $ebooks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ebooks  $ebooks
     * @return \Illuminate\Http\Response
     */
    public function edit(Ebooks $ebooks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ebooks  $ebooks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ebooks $ebooks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ebooks  $ebooks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ebooks $ebooks)
    {
        //
    }

    public function addEbookToChart(){
        $id_ebook       = $_POST['id_ebook'];
        $qty            = 1;
        $unit_price     = $_POST['unit_price'];
        $total_price    = $qty * $unit_price;
        $id_user        = Auth::user()->id;

        // disini perintah insert ebook
        DB::statement("
            INSERT INTO carts(id,id_user,id_ebook,qty,unit_price,total_price,created_at,updated_at, id_product, id_training) 
            VALUES('','$id_user','$id_ebook','$qty','$unit_price', '$total_price', NOW(), NOW(), 0,0);
        ");
                
        $total_belanja = $this->getTotalBelanja(); // ini ambil dari trait homes

        $response = array('status' => 'success', 'total_belanja'    => $total_belanja);

        return json_encode($response); 
    }
}
