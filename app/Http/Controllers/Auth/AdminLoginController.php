<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout']);
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // validasi data
        $validator = $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);
        // attemp untuk admin
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if sukses, redirect intended ke lokasi atau ke dashboard
            return redirect()->intended(route('admin.dashboard'));
        }   return redirect()->back()->withErrors($validator)->withInput($request->only('email', 'remember'));
        // if gagal, redirect back
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
