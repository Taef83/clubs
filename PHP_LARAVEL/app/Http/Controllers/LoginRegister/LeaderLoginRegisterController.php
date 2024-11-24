<?php

namespace App\Http\Controllers\LoginRegister;

use App\Http\Controllers\Controller;
use App\Models\ClubLeader;
use App\Traits\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LeaderLoginRegisterController extends Controller
{
    use UploadImages;

    public function getLoginForm(Request $request)
    {
//        Auth::logout();
//        auth('leaders')->logout();
//        auth('students')->logout();
        $isAuth = true;
        return view('login_register.club_leader.login', compact('isAuth'));
    }

    public function getForgetForm(Request $request)
    {
        $isAuth = true;
        return view('login_register.club_leader.forget', compact('isAuth'));
    }

    public function postLoginForm(Request $request)
    {
        $credentials = $request->validate([
            'email'         => ['required', 'email'],
            'password'      => ['required']
        ]);

        $data = [
            'club_leader_email'     => $credentials['email'],
            'password'              => $credentials['password'],
        ];
        $clubLeader = ClubLeader::where('club_leader_email', $credentials['email'])->first();

        if ($clubLeader && $clubLeader->club_leader_status == 0) {
            return back()->withInput()->withErrors(['email' => ['Please wait until an admin approves your account.']]);
        }
        if (auth('leaders')->attempt($data)) {
            $request->session()->regenerate();

            return redirect()->route('leader.home');
        }
        return back()->withInput()->withErrors(['email' => ['Email or Password not correct']]);
    }

    public function getRegisterForm(Request $request)
    {
        $isAuth = true;
        return view('login_register.club_leader.register', compact('isAuth'));
    }

    public function postRegisterForm(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|min:2|max:80',
            'email'     => 'required|email|unique:club_leader,club_leader_email',
            'password'  => 'required|string|confirmed|min:8',
            'image'     => 'nullable|image',
            'phone'     => 'required|numeric|saudi_phone|unique:club_leader,club_leader_phone'
        ]);
        $data['password'] = Hash::make($data['password']);
        $data['image']  = $request->hasFile('image') ? $this->upload($request->image) : null;

        $user = ClubLeader::create([
            'club_leader_name'      => $data['name'],
            'club_leader_email'     => $data['email'],
            'club_leader_password'  => $data['password'],
            'club_leader_phone'     => $data['phone'],
            'club_leader_image_profile' => $data['image'],
            'club_leader_admin_id'  => 1
        ]);
        auth('leaders')->login($user);
        return redirect()->intended(route('leader.home'));
    }

    public function logout()
    {
        auth('leaders')->logout();
        return redirect(route('leader.login'));
    }
}
