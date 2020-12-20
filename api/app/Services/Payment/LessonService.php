<?php


namespace App\Services\Payment;


use App\Http\Resources\Roles\TeacherResource;
use App\Models\Cell;
use App\Models\Lesson;
use App\Models\User;
use App\Services\OrderServices\Commands\PaymentService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LessonService
{
    const RULES = [
        'start' => 'required',
        'end' => 'required',
    ];

    public static function show(Request $request, string $username)
    {
        $user = $request->user('api');
        $teacher = User::where(['username' => $username])->first();
        $schedule = $teacher->getSchedule(User::TEACHER);
        $cells = $schedule->cells()
            ->where(['mode' => Cell::FREE])
            ->where('start', '<=', $request->get('start'))
            ->where('end', '>=', $request->get('end'))
            ->get();
        $price = 0;
        $tailDateTime = null;
        $start = Carbon::createFromFormat('Y-m-d H:i', $request->get('start'));
        $end = Carbon::createFromFormat('Y-m-d H:i', $request->get('end'));
        $minutes = $end->diffInMinutes($start);
        foreach ($cells as $cell) {
            $cellStart = Carbon::createFromFormat('Y-m-d H:i:s', $cell->start);
            $cellEnd = Carbon::createFromFormat('Y-m-d H:i:s', $cell->end);
            $cellMinutes = $cellEnd->diffInMinutes($cellStart);
            if ($cellMinutes >= $minutes) {
                $pricePerHour = $cell->price;
                $pricePerMinute = $pricePerHour / 60;
                $price = $pricePerMinute * $minutes;
            }
        }
        if ($price != 0) {
            return response([
                'data' => [
                    'start' => $request->get('start'),
                    'end' => $request->get('end'),
                    'price' => (int) round($price),
                    'teacher' => new TeacherResource($teacher)
                ]
            ], Response::HTTP_OK);
        }

        return response()->json([], Response::HTTP_FORBIDDEN);
    }

    public static function store(Request $request, string $username)
    {
        $user = $request->user('api');
        $teacher = User::where(['username' => $username])->first();
        $schedule = $teacher->getSchedule(User::TEACHER);
        $cells = $schedule->cells()
            ->where(['mode' => Cell::FREE])
            ->where('start', '<=', $request->get('start'))
            ->where('end', '>=', $request->get('end'))
            ->get();
        $schedule->cells()
            ->where(['mode' => Cell::FREE])
            ->where('start', '<=', $request->get('start'))
            ->where('end', '>=', $request->get('end'))
            ->update(['mode' => Cell::BLOCKED]);

        $response = [];
    }
}
