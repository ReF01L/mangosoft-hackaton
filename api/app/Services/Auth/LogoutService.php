<?php


namespace App\Services\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LogoutService
{
    public function logout(Request $request)
    {
        $request->user('api')->token()->revoke();
        $cookie = Cookie::forget('_token');
        return response()->noContent()->withCookie($cookie);
    }
}
