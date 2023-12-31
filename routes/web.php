<?php

use App\Http\Controllers\DegreeController;
use App\Http\Controllers\EmployeeActivityController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDegreeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/logout', [LogoutController::class, 'logout']);

//CRUD de tablas
Route::resource('/users',UserController::class);
Route::resource('/roles',RoleController::class);
Route::resource('/employees', EmployeeController::class);
Route::resource('/degrees', DegreeController::class);
Route::resource('/periods', PeriodController::class);
Route::resource('/employee_activity', EmployeeActivityController::class);

//actualizacion de estado en CRUDs
Route::put('/roles/{role}/update-state', [RoleController::class, 'updateState']);
Route::put('/users/{user}/update-state', [UserController::class, 'updateState']);
Route::put('/employees/{employee}/update-state', [EmployeeController::class, 'updateState']);
Route::put('/degrees/{degree}/update-state', [DegreeController::class, 'updateState']);
Route::put('/periods/{period}/update-state', [PeriodController::class, 'updateState']);


//tablas intermedias
Route::get('/users_roles', [UserRoleController::class, 'index']);
Route::resource('/employee_degrees', EmployeeDegreeController::class);


// Rutas de verificación de correo electrónico
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (\Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

