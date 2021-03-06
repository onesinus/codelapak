<?php

namespace App\Http\Controllers;

use App\Trainings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Traits\Home;


class TrainingsController extends Controller
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
            $trainings = Trainings::where('name', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $trainings = Trainings::where('name','!=','')->paginate($perPage);
        }
        
        $id_user_login = isset(Auth::user()->id)?Auth::user()->id:0;

        return view('trainings/index', compact('trainings','id_user_login'));
    }

    public function NeedLogin(){
       return redirect('/trainings');
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
     * @param  \App\Trainings  $trainings
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $training            = Trainings::findOrFail($id);
        
        $id_user_login = isset(Auth::user()->id)?Auth::user()->id:0;
        return view('trainings/show', compact('training', 'id_user_login'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trainings  $trainings
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainings $trainings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainings  $trainings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainings $trainings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainings  $trainings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainings $trainings)
    {
        //
    }

    public function addTrainingToChart(){
        $id_training    = $_POST['id_training'];
        $qty            = 1;
        $unit_price     = $_POST['unit_price'];
        $total_price    = $qty * $unit_price;
        $id_user        = Auth::user()->id;

        // disini perintah insert product jika belum ada, dan tambah qty jika sudah ada ditable
        DB::statement("
            INSERT INTO carts(id,id_user,id_training,qty,unit_price,total_price,created_at,updated_at, id_product, id_ebook) 
            VALUES('','$id_user','$id_training','$qty','$unit_price', '$total_price', NOW(), NOW(), 0,0);
        ");

        $total_belanja = $this->getTotalBelanja(); // ini harus diarahkan ke method getTotalBelanja di homecontroller, kalau gabisa yaudah buat aja fungsinya di controller ini :v

        $response = array('status' => 'success', 'total_belanja'    => $total_belanja);

        return json_encode($response);
    }
}
