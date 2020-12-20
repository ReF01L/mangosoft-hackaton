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
use Illuminate\Support\Facades\Log;

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
        $cell = $cells->first();
        $cellId = !$cell ? null : $cell->id;
        $schedule->cells()
            ->where(['mode' => Cell::FREE])
            ->where('start', '<=', $request->get('start'))
            ->where('end', '>=', $request->get('end'))
            ->update(['mode' => Cell::BLOCKED]);

        try {
            $entity = Lesson::create([
                'start' => $request->get('start'),
                'end' => $request->get('end'),
                'price' => $request->get('price'),
                'cell_id' => $cellId,
                'student_id' => $user->id,
                'teacher_id' => $teacher->id,
            ]);
            return self::generatePaymentResponse($entity);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json([], Response::HTTP_FORBIDDEN);
        }
    }

    public static function generatePaymentResponse(Lesson $lesson)
    {
        $paymentClient = new DefaultService();
        $data = (array) $paymentClient->register($lesson);
        if (in_array('orderId', array_keys($data))) {
            $lesson->update([
                'payment_id' => $data['orderId'],
                'expired_at' => date('Y-m-d H:i', strtotime('+1 hour'))
            ]);
        }
        return response()->json($data, Response::HTTP_CREATED);
    }
}
