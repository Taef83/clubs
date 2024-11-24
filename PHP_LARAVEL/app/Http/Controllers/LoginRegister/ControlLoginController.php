<?php

namespace App\Http\Controllers\LoginRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControlLoginController extends Controller
{
    public function getForm(Request $request)
    {
        Auth::logout();
        auth('leaders')->logout();
        auth('students')->logout();
        $isAuth = true;
        return view('login_register.control.login', compact('isAuth'));
    }

    public function getForgetForm(Request $request)
    {
        $isAuth = true;
        return view('login_register.control.forget', compact('isAuth'));
    }

    public function postForm(Request $request)
    {
        $credentials = $request->validate([
            'email'         => ['required', 'email'],
            'password'      => ['required']
        ]);

        $data = [
            'admin_email'    => $credentials['email'],
            'password' => $credentials['password'],
        ];

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->route('control.home');
        }
        return back()->withInput()->withErrors(['email' => ['Email or Password not correct']]);
    }

    public function logout()
    {
        Auth::logout();
        auth('leaders')->logout();
        auth('students')->logout();
        return redirect(route('control.login'));
    }
}
