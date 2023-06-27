<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\PasswordReset;
use Auth;
use Hash;
use Str;
use Mail;
use Carbon\Carbon;
use Validator;
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


    public function loginFrontEnd()
    {
        return view('fronts.login');
    }


    public function loginFrontEndUser(Request $req){
        $email = $req->email;
        $password = $req->password;

        if(Auth::guard('user')->attempt(["email"=>$email,"password"=>$password],$req->get("remember_token")) && Auth::guard('user')->user()->role_id == 2){
        //    return "okk";
            return redirect()->intended('/');
        }
        return back()->with("msg","Email Or Password is incorrect. Please try Again");

    }


    public function logoutFrontEndUser()
    {
		Auth::guard('user')->logout();
		return redirect('/')
               ->with('message', 'You have been logged out');

    }
    
    public function signup()
    {
         return view('fronts.signup');
    }
    
    public function registerUser(Request $req){
        $find = User::where('email',$req->email)->first();
        if($find){
            return back()->with("message","Email Already Exist");
        }else{
        $users = new User();
        $users->name = $req->name;
        $users->email = $req->email;
        $users->password = Hash::make($req->password);
        $users->save();

        $profile = new UserProfile();
        $profile->first_name = $req->name;
        // $profile->last_name = $req->last_name;
        $userprofile =  $users->userProfile()->save($profile);
   
        if($userprofile){
            if(Auth::guard('user')->attempt(["email"=>$req->email,"password"=>$req->password],$req->get("remember_token")) && Auth::guard('user')->user()->role_id == 2){
            return redirect()->intended('/');
            }
           return back()->with("message","Register successfully");
        }
        }
    }
    
    public function forgotPassword(Request $req){
         $token = Str::random(40);
        //  Mail::send('email.mailVerification',['data'=>$token],function($message) use ($data){
        //     $message->to($req->email)->subject('Reset Password');
        // });
        
        $data['email'] = $req->email;
        $data['title'] = 'Reset password';
        $data['token'] = $token;
        //$data['body'] = 'Your OTP is:- '.$otp;

        Mail::send('email.mailVerification',['data'=>$data],function($message) use ($data){
            $message->to($data['email'])->subject($data['title']);
        });
        PasswordReset::updateOrCreate(['email' => $req->email],array(
            'email' => $req->email,
            'token' => $token,
            'created_at' => Carbon::now()
            ));
        return back()->with("msg","mail successfully send to your Mail");
        
    }

public function resetPasswordView(){
  return view('fronts.resetPassword');
}

public function resetPassword(Request $req){
    $data = array();
      $req->validate([
        'password' => 'required|string|min:6|confirmed',
    ]);
    $getUser = PasswordReset::where("token",$req->token)->first();
    if($getUser){
    User::where('email',$getUser->email)->update(['password' => Hash::make($req->password)]);
    PasswordReset::where("token",$req->token)->update(["token" => ""]);
    return redirect()->route('loginFrontEnd')->with("msg","Password Reset Successfully");
    }
    else{
       return view('fronts.expire');
    }
    //dd($req);
}
    
}
