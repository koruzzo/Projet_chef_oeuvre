<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/User/{id}', [UserController::class, "detail"]);
Route::apiResource("User", UserController::class);
Route::apiResource("Post", PostController::class); 
Route::apiResource("Comment", CommentController::class); 
Route::apiResource("Biography", BiographyController::class); 

Route::get('/user', function (Request $request) {
    return $request->user();
});