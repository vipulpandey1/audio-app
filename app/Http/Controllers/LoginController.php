<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function loginUser(Request $req){
        $email = $req->email;
        $password = $req->password;

        if(Auth::guard('user')->attempt(["email"=>$email,"password"=>$password],$req->remember_token)){
            return redirect()->intended('/admin/dashboard')->with(["popup"=>"true"]);
        }
        return back()->with("error","Email Or Password is incorrect. Please try Again");

    }


    public function logoutUser()
    {
		Auth::guard('user')->logout();
		return redirect('/login')
               ->with('message', 'You have been logged out');

    }
    
}
