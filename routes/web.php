<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

//gates and policies
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post', [App\Http\Controllers\HomeController::class, 'post']);
Route::post('/create_to_post', [App\Http\Controllers\HomeController::class, 'create_to_post']);
Route::get('/delete_post', [App\Http\Controllers\HomeController::class, 'delete_post']);

//roles and permissions
Route::get('/assign-role', [App\Http\Controllers\HomeController::class, 'assignRole']);
Route::get('/assign-permission-to-role', [App\Http\Controllers\HomeController::class, 'assignPermissionToRole']);
Route::get('/create-permission', [App\Http\Controllers\HomeController::class, 'createPermission']);
