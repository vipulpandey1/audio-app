<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Hash;
class LoginWithGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $data = array();
            $user = Socialite::driver('google')->user();
            // dd($user);
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::guard('user')->login($finduser);
      
                return redirect()->intended('/');
       
            }else{
                $data['name'] = $user->name;
                $data['email'] = $user->email;
                $data['google_id'] = $user->id;
                $data['role'] = 2;
                $data['password'] = Hash::make('12345678');
                $newUser = User::updateOrCreate(['email' => $user->email],$data);
                // $newUser = User::create([
                //     'name' => $user->name,
                //     'email' => $user->email,
                //     'google_id'=> $user->id,
                //     'role_id'=> 2,
                //     'password' => encrypt('123456')
                // ]);
      
                Auth::guard('user')->login($newUser);
      
                return redirect()->intended('/');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
