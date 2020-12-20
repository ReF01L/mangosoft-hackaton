<?php


namespace App\Services\Schedule;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GetterService
{
    public static function getSchedule(Request $request, User $user, $role)
    {
        return response()->json([
            'data' => []
        ], Response::HTTP_OK);
    }
}
