<?php


namespace App\Services\Lk;


use App\Models\User;
use App\Services\Auth\RegisterService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class RoleService extends RegisterService
{
    const RULES = [
        'common' => [
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

    public static function store(Request $request, string $role)
    {
        $rules = array_merge(self::RULES['common'], self::RULES[$role]);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_FORBIDDEN);
        }

        $entity = $request->user('api');

        try {
            $entity->assignRole(Role::where(['name' => $role])->first());
            $entity->save();
            RegisterService::saveSkills($role, $entity, $request->get('skills'));
        } catch (ValidationException $e) {
            return response()->json([], Response::HTTP_FORBIDDEN);
        }

        return response()->json([], Response::HTTP_OK);
    }
}
