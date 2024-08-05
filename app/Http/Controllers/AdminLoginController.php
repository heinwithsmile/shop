<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except'=>'logout']);
    }

    public function showLoginForm(){
        return view('auth.admin.login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|min:5'
        ]);

        $email = $request->email;
        $password = $request->password;
        dd($password);
        if(Auth::guard('admin')->attempt(['email'=>$email, 'password'=>$password])){
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
