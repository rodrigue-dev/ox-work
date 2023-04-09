<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeComtroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', [AuthController::class, 'login'])
    ->name('login');
Route::get('/destroy', [AuthController::class, 'destroy'])
    ->name('destroy');
Route::post('/loginstore', [AuthController::class, 'loginstore'])
    ->name('loginstore');
Route::match(array('GET', 'POST'), '/register', [AuthController::class, 'register'])
    //->middleware('guest')
    ->name('register');
Route::match(array('GET', 'POST'),'/reset_password', [AuthController::class, 'reset_password'])
    ->name('reset_password');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeComtroller::class, 'dashboard'])
        ->name('dashboard');
    Route::match(array('GET', 'POST'),'/conge', [HomeComtroller::class, 'conge'])
        ->name('conge');
    Route::match(array('GET', 'POST'),'/periode', [HomeComtroller::class, 'periode'])
        ->name('periode');
    Route::get('/connexions', [HomeComtroller::class, 'connexion'])
        ->name('connexion');
    Route::get('/users', [HomeComtroller::class, 'users'])
        ->name('users');
    Route::get('/savecalandar', [HomeComtroller::class, 'saveCalendar'])
        ->name('savecalandar');
    Route::get('/deletecalandar', [HomeComtroller::class, 'deleteCalandar'])
        ->name('deletecalandar');
    Route::match(array('GET', 'POST'),'/profil', [AuthController::class, 'profil'])
        ->name('profil');
    Route::match(array('GET', 'POST'),'/changepassword', [AuthController::class, 'changepassword'])
        ->name('changepassword');
    Route::match(array('GET', 'POST'),'/changeimage', [AuthController::class, 'changeimage'])
        ->name('changeimage');
});
Route::group(['middleware' => 'isAdmin'], function () {
    Route::match(array('GET', 'POST'),'/conge', [HomeComtroller::class, 'conge'])
        ->name('conge');
    Route::match(array('GET', 'POST'),'/periode', [HomeComtroller::class, 'periode'])
        ->name('periode');
    Route::match(array('GET', 'POST'),'/periode_edit/{id}', [HomeComtroller::class, 'periode_edit'])
        ->name('periode_edit');
    Route::match(array('GET', 'POST'),'/conge_edit/{id}', [HomeComtroller::class, 'conge_edit'])
        ->name('conge_edit');
    Route::get('/delete_conge', [HomeComtroller::class, 'delete_conge'])
        ->name('delete_conge');
    Route::get('/delete_periode', [HomeComtroller::class, 'delete_periode'])
        ->name('delete_periode');
    Route::get('/connexions', [HomeComtroller::class, 'connexion'])
        ->name('connexion');
    Route::get('/users', [HomeComtroller::class, 'users'])
        ->name('users');
    Route::post('/users/sendmail', [HomeComtroller::class, 'sendmail'])
        ->name('sendmail');
    Route::get('/report/calendar', [HomeComtroller::class, 'reportCalendar'])
        ->name('reportcalandar');
});

