<?php


namespace App\Services\Schedule;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SetterService
{
    const SET_SCHEDULE_RULES = [
        'start' => 'required',
        'end' => 'required',
        'price' => 'required',
    ];

    const SET_LESSON_RULES = [
        'start' => 'required',
        'end' => 'required',
    ];

    public static function setSchedule(Request $request)
    {

        return response()->json([], Response::HTTP_OK);
    }

    public static function updateSchedule(Request $request, int $id)
    {
        return response()->json([], Response::HTTP_OK);
    }

    public static function deleteSchedule(Request $request, int $id)
    {
        return response()->json([], Response::HTTP_OK);
    }

    public static function setLesson(Request $request)
    {
        return response()->json([], Response::HTTP_OK);
    }

    public static function previewLesson(Request $request)
    {
        return response()->json([], Response::HTTP_OK);
    }
}
