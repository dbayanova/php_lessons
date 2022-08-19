<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\COntrollers\NotificationController;
use App\Http\COntrollers\TemplateController;
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
Route::get('/get-list-templates', [TemplateController::class, 'list']);
Route::get('/get-list-notifications', [NotificationController::class, 'list']);
Route::get('/get-item-template', [TemplateController::class, 'item']);
Route::get('/get-item-notification', [NotificationController::class, 'item']);
