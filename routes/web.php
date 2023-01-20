<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;

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

Route::get('/', [UserController::class, 'welcome']);

Route::get('/employee/all', [EmployeeController::class, 'all'])->middleware('auth');
Route::get('/employee/create', [EmployeeController::class, 'create'])->middleware('auth');
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->middleware('auth');
Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->middleware('auth');
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'delete'])->middleware('auth');

Route::get('/client/all', [ClientController::class, 'all'])->middleware('auth');
Route::get('/client/create', [ClientController::class, 'create'])->middleware('auth');
Route::post('/client/insert', [ClientController::class, 'insert'])->name('client.insert')->middleware('auth');
Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->middleware('auth');
Route::put('/client/update/{id}', [ClientController::class, 'update'])->middleware('auth');
Route::delete('/client/delete/{id}', [ClientController::class, 'delete'])->middleware('auth');


Route::post('/register.insertUser', [CustomAuthController::class, 'insertUser'])->name('register.insertUser');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
