<?php


namespace App\Services\Lk;


use App\Http\Resources\General\SkillResource;
use App\Http\Resources\General\UserResource;
use App\Http\Resources\Roles\TeacherResource;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DefaultService
{
    const EXPIRE_TIME = 31536000;

    const RULES = [
        'description' => 'nullable',
    ];

    public static function index(Request $request)
    {
        $user = $request->user('api');

        $data = [
            'data' => (array) new UserResource($user),
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
        ];
        return response()->json($data);
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
        $user = $request->user('api');
        $skills = $user->skills($request->cookie('_role'))->pluck('id');
        if ($request->get('mode') == 1) {
            $skills->add($id);
            $skills = $skills->unique();
        } else {
            $skills = $skills->filter(function ($value, $key) use ($id) {
                return $value != $id;
            });
        }
        $values = [];
        foreach ($skills as $skill) {
            $values[] = [
                'user_id' => $user->id,
                'skill_id' => $skill,
                'role' => $request->cookie('_role')
            ];
        }
        DB::table('skill_user')->where([
            'user_id' => $user->id,
            'role' => $request->cookie('_role')
        ])->delete();
        DB::table('skill_user')->insert($values);

        return self::index($request);
    }

    public static function update(Request $request)
    {
        $validator = Validator::make($request->all(), self::RULES);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        $entity = $request->user('api');
        try {
            $entity->update($validator->validated());
        } catch (ValidationException $exception) {
            Log::error($exception->getMessage());
        }

        return self::index($request);
    }
}
