<?php


namespace App\Services\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ConfirmService
{
    public static function confirm(Request $request)
    {
        $token = $request->get('token');
        if (!$token) { return response()->json([], Response::HTTP_FORBIDDEN); }
        $data = DB::table('confirm_tokens')
            ->where(['token' => $token])
            ->where('expired_at', '>=', date('Y-m-d H:i:s'))
            ->first();
        if (!$data) { return response()->json([], Response::HTTP_NOT_FOUND); }
        $user = User::find($data->user_id);
        try {
            DB::table('confirm_tokens')->where(['token' => $token])->delete();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
        $user->update(['active' => true]);
        return response()->json([], Response::HTTP_OK);
    }
}
