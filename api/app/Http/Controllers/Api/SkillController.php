<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\General\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([
            'data' => SkillResource::collection(Skill::all()),
        ], Response::HTTP_OK);
    }
}
