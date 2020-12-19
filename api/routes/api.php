<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    AuthController,
    UserController,
    SkillController,
    LkController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function() {
    Route::get('confirm', [AuthController::class, 'confirm']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout'])->middleware(['auth.cookie', 'auth.exists']);
});

Route::group([
    'prefix' => 'skills'
], function () {
    Route::get('', [SkillController::class, 'index']);
});

Route::group([
    'prefix' => 'users'
], function() {
    Route::get('', [UserController::class, 'index']);
    Route::get('{username}', [UserController::class, 'show']);
});

Route::group([
    'prefix' => 'lk',
    'middleware' => ['auth.cookie', 'auth.exists']
], function() {
    Route::get('', [LkController::class, 'index']);
    Route::get('roles/{role}/set', [LkController::class, 'changeRole']);
    Route::post('roles/{role}/add', [LkController::class, 'addRole']);
    Route::get('skills/{id}', [LkController::class, 'updateSkill']);
    Route::post('', [LkController::class, 'update']);
});
