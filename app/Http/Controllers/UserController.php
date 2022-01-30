<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    function register(Request $request)
    {
        $user = new User;
        $user-> name = $request->input('name');
        $user-> lastName = $request->input('lastName');
        $user-> email = $request->input('email');
        $user-> password = Hash::make($request->input('password'));
        $user-> user_role = "IS_CUSTOMER";
        $user->save();
        return "Registered succsesfully";
    }
    public function login(Request $request)
    {
        $login = $request->validate([
            'email' =>'required|string',
            'password' =>'required|string'
        ]);
        if(!Auth::attempt($login)){
            return response(['message' => "Invalid login"]);
        }
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response(['Authorization' =>'Bearer ' .$accessToken]);           
    }
    public function deleteUser(Request $request){
        $id = $request->input('id');
        $user = User::find($id);    
        $user->delete();
        return "The account has been deleted!";
    }
    public function allUsers(){
        return User::all();
    }
    
}
