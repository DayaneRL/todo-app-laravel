<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{TaskController, UsersController, DashboardController, NotebookController};

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

Route::resource('/', TaskController::class);
Route::patch('/changeStatus/{id}', [TaskController::class, 'changeStatus']);
Route::delete('/{id}', [TaskController::class, 'destroy']);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', UsersController::class)->middleware('role:admin');
    Route::resource('dashboard', DashboardController::class)->middleware('role:user');
    Route::resource('notebooks', NotebookController::class)->middleware('role:user');
});

Auth::routes();
