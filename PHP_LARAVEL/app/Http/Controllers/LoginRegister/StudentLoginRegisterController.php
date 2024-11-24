<?php

namespace App\Http\Controllers\LoginRegister;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\ForgetPassword;
use App\Traits\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentLoginRegisterController extends Controller
{
    use UploadImages;

    public function getLoginForm(Request $request)
    {
        Auth::logout();
        auth('leaders')->logout();
        auth('students')->logout();
        $isAuth = true;
        return view('login_register.student.login', compact('isAuth'));
    }

    public function postLoginForm(Request $request)
    {
        $credentials = $request->validate([
            'email'         => ['required', 'email'],
            'password'      => ['required']
        ]);
        $data = [
            'student_email'         => $credentials['email'],
            'password'              => $credentials['password'],
        ];
        if (auth('students')->attempt($data)) {
            $request->session()->regenerate();

            return redirect()->route('student.home');
        }
        return back()->withInput()->withErrors(['email' => ['Email or Password not correct']]);
    }

    public function getRegisterForm(Request $request)
    {
        $isAuth = true;
        return view('login_register.student.register', compact('isAuth'));
    }

    public function postRegisterForm(Request $request)
    {
        $data = $request->validate([
            'student_name'              => 'required|string|max:255',
            'student_email'             => 'required|string|email|max:255|unique:student,student_email',
            'password'                  => 'required|string|min:8|confirmed',
            'student_phone'             => 'required|numeric|saudi_phone|unique:student,student_phone',
            'image_profile'             => 'nullable|image',
            'student_major'             => 'required',
            'student_skills'            => 'nullable',
            'academic_number'         => 'required|numeric|unique:student,student_number_id'
        ]);

        $data['image_profile']          = $request->hasFile('image_profile') ? $this->upload($request->image_profile) : null;
        $data['student_password']       = Hash::make($request->password);

        $user = Student::create($data);
        auth('students')->login($user);
        return redirect()->intended(route('student.home'));
    }

    public function logout()
    {
        auth('students')->logout();
        return redirect(route('student.login'));
    }

    public function getForgetForm(Request $request)
    {
        $isAuth = true;
        return view('login_register.student.forget', compact('isAuth'));
    }

    public function getResetForm(Request $request)
    {
        $isAuth = true;
        return view('login_register.student.reset', compact('isAuth'));
    }

    public function postForgetForm(Request $request)
    {
        $user = Student::where('student_email', $request->email)->first();
        if(!$user){
            return back()->withInput()->withErrors(['email' => ['Enter valid email.']]);
        }
        $forget = ForgetPassword::create(['email' => $request->email, 'code' => rand(1000000, 9999999)]);
        return redirect()->route('student.reset', ['email' => $request->email]);
    }

    public function postResetForm(Request $request)
    {
        $user = Student::where('student_email', $request->email)->first();
        if(!$user){
            return back()->withInput()->withErrors(['email' => ['Enter valid email.']]);
        }
        $forget = ForgetPassword::where('email', $request->email)->where('code', $request->code)->where('is_used', 0)->first();
        if(!$forget){
            return back()->withInput()->withErrors(['email' => ['Not valid code or email.']]);
        }
        auth('students')->login($user);
        return redirect()->intended(route('student.home'));
    }
}
