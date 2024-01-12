<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function regis() {
        return view('registration');
    }

    public function registration(Request $request) {
        $this->validate($request, [
            'nama' => 'require',
        ]);
    }
}
