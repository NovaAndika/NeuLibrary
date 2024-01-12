<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        if(Auth::check()){
            return view('/');
        }

        return redirect('/login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = [
            'email' => $request->input('emial'),
            'password' => $request->input('password')
        ];

        if(Auth::attempt($user)){
            return view('/');
        }

        return redirect('login');

    }
}
