<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function Register(Request $request){

       $request->validate([
        "name" => "required|string",
        "email" => "required|string|email|unique:users",
        "password" => "required|confirmed",
       ]);

       User::create([
        "name" => $request->name,
        "email" => $request->email,
        "password" => bcrypt($request->password),
       ]);

       return response()->json([
        "status" => true,
        "message" => "User Created Successfully",
        "data" => []
       ]);


    } // End Method

    public function Login(Request $request){

        $request->validate([
            "email" => "required|email|string",
            "password" => "required|confirmed",
        ]);

        $user = User::where("email", $request->email)->first();

        if(!empty($user)){

            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken("MyToken")->accessToken;
                return response()->json([
                    "status" => true,
                    "message" => "Login Successful",
                    "token" => $token,
                    "data" => []
                ]);
            }else{
                return response()->json([
                    "status" => false,
                    "message" => "Password didn't match",
                    "data" => []
                ]); 
            }

        }else{
            return response()->json([
                "status" => true,
                "message" => "Email didn't match",
                "data" => []
            ]);
        }

    } // End Method

    public function Profile(){
        $userData = auth()->user();
        return response()->json([
            "status" => true,
            "message" => "User Profile Information",
            "data" => $userData,
            
        ]);
    } // End Method

    public function Logout(){
        $token = auth()->user()->token();
        $token->revoke();
        return response()->json([
            "status" => true,
            "message" => "User Logout Successfully"
        ]);
    } // End Method
}
