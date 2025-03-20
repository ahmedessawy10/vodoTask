<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\ProfileController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware("auth:sanctum")->group(function () {

    Route::post("/notes/{note}", [NoteController::class, "update"]);
    Route::apiResource("notes", NoteController::class)->except("create", 'edit');

    Route::post("/profile", [ProfileController::class, 'updateProfile']);
    Route::get("/profile", [ProfileController::class, 'getProfile']);
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgetpassword', [AuthController::class, 'forgot_password']);
Route::post('/resetpassword', [AuthController::class, 'reset_password']);
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum');


Route::post('/forgot-password', [AuthController::class, "forgot_password"])->middleware('guest')->name('password.email');
