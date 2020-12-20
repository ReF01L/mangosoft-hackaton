<?php


namespace App\Services\Schedule;


use App\Models\Cell;
use App\Services\Payment\LessonService;
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
        $user = $request->user('api');
        $schedule = $user->getSchedule($request->cookie('_role'));
        $cell = Cell::create([
            'schedule_id' => $schedule->id,
            'start' => $request->get('start'),
            'end' => $request->get('end'),
            'price' => $request->get('price'),
        ]);
        return GetterService::getSchedule($request, $user, $request->cookie('_role'));
    }

    public static function updateSchedule(Request $request, int $id)
    {
        $user = $request->user('api');
        $schedule = $user->getSchedule($request->cookie('_role'));
        $cell = Cell::where([
            'id' => $id,
            'schedule_id' => $schedule->id
        ])->first();
        if (!$cell) { return response()->json([], Response::HTTP_FORBIDDEN); }
        $cell->update($request->all());
        return GetterService::getSchedule($request, $user, $request->cookie('_role'));
    }

    public static function deleteSchedule(Request $request, int $id)
    {
        $user = $request->user('api');
        $schedule = $user->getSchedule($request->cookie('_role'));
        $cell = Cell::where([
            'id' => $id,
            'schedule_id' => $schedule->id
        ])->first();
        if (!$cell) { return response()->json([], Response::HTTP_FORBIDDEN); }
        $cell->delete();
        return GetterService::getSchedule($request, $user, $request->cookie('_role'));
    }

    public static function setLesson(Request $request)
    {
        return LessonService::store($request);
    }

    public static function previewLesson(Request $request)
    {
        return LessonService::show($request);
    }
}
