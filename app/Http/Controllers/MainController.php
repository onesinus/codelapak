<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class MainController extends Controller
{
    public function index(){
        $bestApps = DB::table('products')
        ->join('product_images', function($join){
            $join->on('product_images.id_product', '=', 'products.id')
            ->where('product_images.main_image','=','1');

        })
        ->groupBy('id_product')
        ->orderBy('rating','desc')
        ->limit(4)
        ->get();

        return view('index', compact('bestApps'));
    }
}
