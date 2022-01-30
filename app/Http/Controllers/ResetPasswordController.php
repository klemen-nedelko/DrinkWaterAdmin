<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    public function forgotPassword(){
       $credentials = request()->validate(['email'=>'required|email']);
       Password::sendResetLink($credentials);
       if(!Password::sendResetLink($credentials)){
        return response(['message' => "Invalid email"]);
    }
       return "Reset password link sent on your email";
    }

   public function resetPassword(Request $request){ 
       //ResetPasswordRequestController $request
       $credentials = request()->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
           
       ]);
       $email_password_status = Password::reset($credentials, function($user, $password){
        $user->forceFill([
            'password' => Hash::make($password)
        ]);

        $user->save();
           //event(new PasswordReset($user));
       });
       if($email_password_status == Password::INVALID_TOKEN){
           return "Invalid Token";
       }
       return"Password successfuly changed!";
   }
}
