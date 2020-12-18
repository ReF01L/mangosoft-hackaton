<?php


namespace App\Services\Auth;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class LoginService
{
    const RULES = [
        'email' => 'required|string|max:255|unique:users,email',
        'password' => 'required|string|min:6|max:255',
    ];

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), self::RULES);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        $params = [
            'grant_type' => 'password',
            'client_id' => config('passport.PASSPORT_CLIENT_ID'),
            'client_secret' => config('passport.PASSPORT_CLIENT_SECRET'),
            'username' => $request['email'],
            'password' => $request['password'],
            'scope' => '*'
        ];

        $request->request->add($params);

        $response = Route::dispatch(
            Request::create('oauth/token', 'POST', $request->request->all())
        );

        if ($response->status() != Response::HTTP_OK) {
            return response()->json([
                'message' => 'Некорректные данные пользователя',
                'errors' => [
                    'password' => [
                        'Неправильный пароль',
                    ],
                ]
            ], Response::HTTP_UNAUTHORIZED);
        }

        $response = json_decode($response->getContent());

        return response('')->withCookie('_token', $response->access_token, $response->expires_in);
    }
}
