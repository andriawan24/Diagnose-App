<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {

        if (Auth::user()) {
            return redirect()->route('admin.index');
        }

        return view('auth.login');
    }

    public function login(Request $request) {
        $email = $request->email;
        $password = $request->password;

        $user = Auth::attempt(["email" => $email, "password" => $password]);

        if ($user) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->withInput()->with('error', 'Username/password salah');
        }
    }
}
