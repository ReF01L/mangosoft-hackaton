<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\General\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->get('role', User::TEACHER);
        $users = User::role($role)->get();
        return response()->json([
            'data' => UserResource::collection($users)
        ], Response::HTTP_OK);
    }

    public function show(Request $request, $username)
    {
        $user = User::find($username);
        if ($user) {
            return response()->json([
                'data' => new UserResource($user)
            ], Response::HTTP_OK);
        }
        return response()->json([], Response::HTTP_NOT_FOUND);
    }
}
