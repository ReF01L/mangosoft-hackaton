<?php


namespace App\Services\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterService
{
    const TYPE_FUNCTIONS = [
        'student' => 'registerStudent',
        'teacher' => 'registerTeacher',
        'company' => 'registerCompany',
    ];

    const RULES = [
        'common' => [
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email|max:255',
            'password' => 'required|string|min:6|max:255|confirmed',
        ],
        'student' => [

        ],
        'teacher' => [
            'subject' => 'required|string|max:255'
        ],
        'company' => [
            'company_name' => 'required|string|max:255|unique:users,company_name'
        ],
    ];

    public static function register(Request $request)
    {
        $rules = array_merge(self::RULES['common'], self::RULES[$request->get('role')]);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        try {
            User::create($validator->validated());
        } catch (ValidationException $e) {
            return response()->json([], Response::HTTP_FORBIDDEN);
        }

        return response()->json([], Response::HTTP_CREATED);
    }

    private static function registerStudent(Request $request)
    {

    }

    private static function registerTeacher(Request $request)
    {

    }

    private static function registerCompany(Request $request)
    {

    }
}
