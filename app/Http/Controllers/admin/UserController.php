<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->to('/');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ];

            if (Auth::attempt($user)) {
                return redirect()->to('/');
            }
            // dd($request->all());

            throw new Exception('Invalid credentials');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors());
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
