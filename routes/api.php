<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TemplateController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/create-template', [TemplateController::class, 'create']);
Route::post('/create-notifications', [NotificationController::class, 'create']);
Route::put('/template/{id}', [TemplateController::class, 'update']);
Route::put('/notification/{id}', [NotificationController::class, 'update']);
Route::delete('/delete/{id}', [TemplateController::class, 'delete']);
Route::delete('/delete-notification', [NotificationController::class, 'delete']);
Route::get('/templates-list', [TemplateController::class, 'list']);
Route::get('/notifications-list', [NotificationController::class, 'list']);
Route::get('/item-template/{id}', [TemplateController::class, 'item']);
Route::get('/item-notification/{id}', [NotificationController::class, 'item']);
Route::post('/send-mail/{id}/{my_text}/{sender}', [NotificationController::class, 'sendEmail']);
