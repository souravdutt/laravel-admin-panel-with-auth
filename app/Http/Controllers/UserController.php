<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function signup()
    {
        $settings = (object) [
            'title' => 'Signup',
            'description' => 'Signup page',
            'keywords' => 'signup, page',
        ];

        return view('signup', compact('settings'));
    }

    public function signupSubmit(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|min:8|max:99',
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if($user) return redirect()->route('signin')->with('success','Congrats! Signup successful!');

        return redirect()->back()->with('error', 'Sorry, Error while Signing up! Please try again later.')->withInput();
    }

    public function signin()
    {
        $settings = (object) [
            'title' => 'Signin',
            'description' => 'Signin page',
            'keywords' => 'signin, page',
        ];

        return view('signin', compact('settings'));
    }

    public function signinSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:100',
            'password' => 'required',
            'remember_me' => 'nullable',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me))
            return redirect()->intended('user');

        return redirect()->back()->with('error', 'Sorry, Incorrect email or password.')->withInput();
    }

    public function dashboard()
    {
        $settings = (object) [
            'title' => 'Dashboard',
            'description' => 'Dashboard page',
            'keywords' => 'dashboard, page',
        ];

        return view('user.dashboard', compact('settings'));
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('signin')->with('success','Congrats! You are successfully logged out!');
    }

    public function forgotPassword()
    {
        $settings = (object) [
            'title' => 'Forgot Password',
            'description' => 'Forgot Password page',
            'keywords' => 'forgot password, page',
        ];

        return view('forgotPassword', compact('settings'));
    }

    public function forgotPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:100',
        ]);

        $user = User::where('email', $request->email)->first();

        if($user) {
            $user->password = Hash::make(str_random(8));
            $user->save();

            return redirect()->route('signin')->with('success', 'Password reset successful! Please check your email.');
        }

        return redirect()->back()->with('error', 'Sorry, given email not registered with us.');
    }

}
