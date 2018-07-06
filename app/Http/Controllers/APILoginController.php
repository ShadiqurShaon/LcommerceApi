<?php

namespace App\Http\Controllers;

//use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

use App\User;
use JWTFactory;


use Response;

class APILoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);

        if ($validator->fails()) {
//            return response()->json($validator->errors());
            $error = $validator->errors();
            return Response::json(compact('error'));
        }

        $credentials = $request->only('email', 'password');


            if ( $token = JWTAuth::attempt($credentials)) {
                 $user = Auth::user();
                return response()->json(compact('token','user'));
            }
        $error[][0] = 'invalid_credentials';
        return response()->json(compact('error'));
    }
}