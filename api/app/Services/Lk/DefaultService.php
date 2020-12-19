<?php


namespace App\Services\Lk;


use App\Http\Resources\General\SkillResource;
use App\Http\Resources\General\UserResource;
use App\Http\Resources\Roles\TeacherResource;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DefaultService
{
    const EXPIRE_TIME = 31536000;

    public static function index(Request $request)
    {
        $user = $request->user('api');

        return response()->json([
            'data' => new UserResource($user),
            'skills' => SkillResource::collection(Skill::all()),
            'recommends' => TeacherResource::collection(
                User::with(['skills' => function ($query) use ($user) {
                    $query->whereIn('skills.id', $user->skills()->pluck('id')->toArray());
                }])
                ->whereHas('skills')
                ->where('users.id', '!=', $user->id)
                ->role('teacher')
                ->get()
            )
        ], Response::HTTP_OK);
    }

    public static function changeRole(Request $request, string $role)
    {
        $user = $request->user('api');

        return response()->json([
            'data' => new UserResource($user),
            'skills' => SkillResource::collection(Skill::all()),
            'recommends' => TeacherResource::collection(
                User::with(['skills' => function ($query) use ($user) {
                    $query->whereIn('skills.id', $user->skills()->pluck('id')->toArray());
                }])
                ->whereHas('skills')
                ->where('users.id', '!=', $user->id)
                ->role('teacher')
                ->get()
            )
        ], Response::HTTP_OK)
            ->withCookie('_role', $role, self::EXPIRE_TIME);
    }

    public static function updateSkill(Request $request, int $id)
    {
        
    }

    public static function update(Request $request)
    {

    }
}
