<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use JWTAuth;

class LoginController extends Controller
{
    public function login(Request $request){
        $creds = $request->only(['email', 'password']);

        // $token = JWTAuth::attempt($creds, $rememeber = true);
        if(!$token = JWTAuth::attempt($creds)){
            return apiReturn($creds, 'Incorrect Email/Password', 'failed');
        }

        return response()->json(['token' => $token]);
    }
    public function me()
    {
        return response()->json(auth()->user());
    }

    public function refresh(){
        try {

            $newToken = JWTAuth::refresh();
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }

        return response()->json(['token' => $newToken]);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
