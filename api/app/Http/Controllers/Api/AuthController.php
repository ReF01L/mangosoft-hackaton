<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use App\Services\Auth\RegisterService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return RegisterService::register($request);
    }

    public function login(Request $request)
    {
        return LoginService::login($request);
    }

    public function logout(Request $request)
    {
        return LogoutService::logout($request);
    }
}
