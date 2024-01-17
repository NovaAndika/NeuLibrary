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
        if (Auth::guard('web')->check()) {
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

            // dd($request->all());

            if (Auth::guard('web')->attempt([
                    'email' => $request->input('email'),
                    'password' => $request->input('password')
                ])) {
                    // dd("Logged in!");
                return redirect()->to('/');
            }

            throw new Exception('Invalid credentials');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors());
        } catch (Exception $e) {
            // dd($request->all(),$e -> getMessage());
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }
}
