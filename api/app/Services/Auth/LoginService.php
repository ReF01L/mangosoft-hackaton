<?php


namespace App\Services\Auth;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class LoginService
{
    const RULES = [
        'username' => 'required|string|max:255|exists:users,username',
        'password' => 'required|string|min:6|max:255',
    ];

    public static function login(Request $request)
    {
        $validator = Validator::make($request->all(), self::RULES);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        $params = [
            'grant_type' => 'password',
            'client_id' => config('passport.id'),
            'client_secret' => config('passport.secret'),
            'username' => $request->get('username'),
            'password' => $request->get('password'),
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

        $user = self::getUser($request, "{$response->token_type} {$response->access_token}");
        $role = $user->roles()->pluck('name')->toArray()[0];

        return response('')
            ->withCookie('_token', $response->access_token, $response->expires_in)
            ->withCookie('_role', $role, $response->expires_in);
    }

    private static function getUser(Request $request, $bearerToken)
    {
        $request->headers->add(['Authorization' => $bearerToken]);
        return $request->user('api');
    }
}
