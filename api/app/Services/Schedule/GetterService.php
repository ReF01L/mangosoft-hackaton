<?php


namespace App\Services\Schedule;


use App\Http\Resources\Schedule\CellResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GetterService
{
    public static function getSchedule(Request $request, User $user, $role)
    {
        $schedule = $user->getSchedule($role);
        return response()->json([
            'data' => CellResource::collection($schedule->cells()->orderBy('start')->get())
        ], Response::HTTP_OK);
    }
}
