<?php

use Illuminate\Support\Facades\Route;
use App\Exceptions\NeMoguOtrabotatEx;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TemplateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function (){
    throw new NeMoguOtrabotatEx('Не могу отработать исключение');
    var_dump('hello browser');
});

Route::get('/first', [FirstController::class, 'info']);
Route::get('/set-category', [CategoryController::class, 'set']);
Route::get('/get-category', [CategoryController::class, 'index']);
