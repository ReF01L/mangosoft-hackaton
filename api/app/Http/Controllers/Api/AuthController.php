<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Auth\RegisterService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    const TYPE_FUNCTIONS = [
        'student' => 'registerStudent',
        'teacher' => 'registerTeacher',
        'company' => 'registerCompany',
    ];

    public function register(Request $request)
    {
        $method = self::TYPE_FUNCTIONS[$request->get('role', 'student')];
        return RegisterService::$method($request);
    }

    public function login(Request $request)
    {

    }

    public function logout(Request $request)
    {

    }
}
