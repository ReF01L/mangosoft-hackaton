<?php


namespace App\Services\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class RegisterService
{
    const RULES = [
        'common' => [
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|string|email|unique:users,email|max:255',
            'password' => 'required|string|min:6|max:255',
            'skills' => 'required|array',
        ],
        'student' => [

        ],
        'teacher' => [

        ],
        'company' => [
            'company_name' => 'required|string|max:255',
            'company_position' => 'required|string|max:255',
            'company_description' => 'nullable',
        ],
    ];

    public static function register(Request $request)
    {
        $role = $request->get('role');
        if (!$role) { return response()->json([], Response::HTTP_FORBIDDEN); }
        $rules = array_merge(self::RULES['common'], self::RULES[$role]);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        $entity = null;

        try {
            $entity = User::create($validator->validated());
            $entity->assignRole(Role::where(['name' => $role])->first());
            $entity->save();
            self::saveSkills($role, $entity, $request->get('skills'));
        } catch (ValidationException $e) {
            return response()->json([], Response::HTTP_FORBIDDEN);
        }

        return response()->json([], Response::HTTP_CREATED);
    }

    private static function saveSkills(string $role, User $user, array $skills)
    {
        foreach ($skills as $skill) {
            $data = [
                'user_id' => $user->id,
                'skill_id' => $skill,
                'role' => $role,
            ];
            DB::table('skill_user')->updateOrInsert($data, $data);
        }
    }
}
