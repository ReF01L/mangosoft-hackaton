<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\General\SkillResource;
use App\Http\Resources\General\UserResource;
use App\Http\Resources\Roles\TeacherResource;
use App\Models\Skill;
use App\Models\User;
use App\Services\Lk\DefaultService;
use App\Services\Lk\RoleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LkController extends Controller
{
    public function index(Request $request)
    {
        return DefaultService::index($request);
    }

    public function changeRole(Request $request, string $role)
    {
        return DefaultService::changeRole($request, $role);
    }

    public function addRole(Request $request, string $role)
    {
        return RoleService::store($request, $role);
    }

    public function updateSkill(Request $request, int $id)
    {
        return DefaultService::updateSkill($request, $id);
    }

    public function update(Request $request)
    {
        return DefaultService::update($request);
    }
}
