<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $users = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $users = User::where('name','!=','')->paginate($perPage);
        }
        
        return view('users.index', compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $requestData = $request->all();
        $requestData['password'] = bcrypt($requestData['password']);
        User::create($requestData);

        return redirect('users')->with('alert-success', 'User added!');
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id.'',
		]);

        $requestData = $request->all();

        $user = User::findOrFail($id);
        $user->update($requestData);
        
        return redirect('users')->with('alert-success', 'User updated!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('users')->with('alert-success', 'User deleted!');
    }
}
