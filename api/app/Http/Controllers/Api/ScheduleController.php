<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Schedule\GetterService;
use App\Services\Schedule\SetterService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScheduleController extends Controller
{
    public function showByUser(Request $request, string $username)
    {
        $user = User::where(['username' => $username])->first();
        if (!$user) { return response()->json([], Response::HTTP_NOT_FOUND); }
        return GetterService::getSchedule($request, $user, User::TEACHER);
    }

    public function showByLk(Request $request)
    {
        $user = $request->user('api');
        return GetterService::getSchedule($request, $user, $request->cookie('_role'));
    }

    public static function setSchedule(Request $request)
    {
        return SetterService::setSchedule($request);
    }

    public static function updateSchedule(Request $request, int $id)
    {
        return SetterService::updateSchedule($request, $id);
    }

    public static function deleteSchedule(Request $request, int $id)
    {
        return SetterService::deleteSchedule($request, $id);
    }

    public static function setLesson(Request $request)
    {
        return SetterService::setLesson($request);
    }

    public static function previewLesson(Request $request)
    {
        return SetterService::previewLesson($request);
    }
}
