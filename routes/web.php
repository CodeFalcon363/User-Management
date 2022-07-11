<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', '\App\Http\Controllers\HomeController@index')->name('home');

// Admin Routes
Route::resource('admin',App\Http\Controllers\Admin\AdminController::class);
Route::resource('admin_supervisors',App\Http\Controllers\Admin\UserController::class);
Route::get('admins/profile',[App\Http\Controllers\Admin\AdminController::class,'profile'])->name('admins.profile');
Route::post('admins/profile/update',[App\Http\Controllers\Admin\AdminController::class,'update'])->name('admins.profile.update');
Route::post('note',[App\Http\Controllers\Admin\UserController::class,'note'])->name('note');;

// Supervisor Routes
Route::get('supervisors',[App\Http\Controllers\Supervisor\SupervisorController::class,'index'])->name('supervisors.index');;
Route::get('supervisors/profile',[App\Http\Controllers\Supervisor\SupervisorController::class,'profile'])->name('supervisors.profile');
Route::post('supervisors/profile/update',[App\Http\Controllers\Supervisor\SupervisorController::class,'update'])->name('supervisors.profile.update');
Route::resource('supervisor_students',App\Http\Controllers\Supervisor\StudentController::class);
Route::resource('supervisor_records',App\Http\Controllers\Supervisor\RecordController::class);

// Student Routes
Route::resource('students',App\Http\Controllers\Student\StudentController::class);
Route::resource('records',App\Http\Controllers\Student\RecordController::class);
Route::get('student/profile',[App\Http\Controllers\Student\StudentController::class,'profile'])->name('student.profile');
Route::post('student/profile/update',[App\Http\Controllers\Student\StudentController::class,'update'])->name('student.profile.update');
