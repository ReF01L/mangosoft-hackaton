<?php


namespace App\Services\Sync;


use App\Mail\DefaultMailBuilder;
use App\Models\Cell;
use App\Models\Lesson;
use App\Models\Notification;
use App\Services\Payment\DefaultService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CheckPaymentService
{
    public static function sync()
    {
        $paymentClient = new DefaultService();
        $waitPayments = Lesson::waiting()->get();
        $expirePayments = Lesson::expired()->get();
        foreach ($waitPayments as $entity) {
            $isChecked = self::checkPaymentStatus($paymentClient, $entity);
            if ($isChecked) {
                $cell = $entity->cell;
                $cell->update([
                    'start' => $entity->start,
                    'end' => $entity->end,
                    'mode' => Cell::ACTIVE,
                ]);
                self::sendMails($entity);
            }
        }
        foreach ($expirePayments as $entity) {
            $cell = $entity->cell;
            $cell->update([
                'mode' => Cell::FREE
            ]);
        }
        $expirePayments->delete();
    }

    private static function checkPaymentStatus(DefaultService $client, Lesson $entity)
    {
        $data = $client->getOrderStatusExtended($entity->payment_id);
        $data = (array) $data;
        if (isset($data['actionCode'])) {
            $code = $data['actionCode'];
            if ($code == 0) {
                self::setSuccess($entity);
                return true;
            } elseif ($code != 0 && $code != -100) {
                return false;
            } else {
                return false;
            }
        }
        return false;
    }

    private static function setSuccess(Lesson $entity)
    {
        $entity->update([
            'paid' => true
        ]);
    }

    private static function sendMails(Lesson $entity)
    {
        try {
            $notification = Notification::create([
                'title' => 'Оплата  прошла успешно!',
                'description' => "Ваше занятие запланированно {$entity->start}. Контакты для связи с преподавателем отправлены Вам на почту! Продуктивного дня!",
                'user_id' => $entity->student_id,
                'read' => false,
                'type' => Notification::PAYMENT,
            ]);
            Mail::to($entity->student->email)->send(new DefaultMailBuilder([
                'name' => $entity->student->name,
                'title' => $notification->title,
                'description' => "Ваше занятие запланированно {$entity->start}. Контакты для связи с преподавателем: {$entity->teacher->email} ({$entity->teacher->phone})",
            ]));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
    }
}
