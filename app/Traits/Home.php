<?php

namespace App\Traits;

use DB; 
use Illuminate\Support\Facades\Auth;

trait Home {
    public function getTotalBelanja(){
        $id_user        = Auth::user()->id;
        $get_total_cart = DB::select("SELECT COUNT(*) as total_belanja FROM carts WHERE status = 'unpaid' AND id_user = " . $id_user);
        foreach($get_total_cart as $gtc){
            $total_belanja = $gtc->total_belanja;
        }
        return $total_belanja;
    }    
}

?>