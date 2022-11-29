<?php

use App\Http\Controllers\api\NewPasswordController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\RatesController;
use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', [AuthController::class, 'user']);
    
});

//password
Route::post('forgot-password', [NewPasswordController::class, 'ForgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'Reset']);

///// clients
Route::resource('/clients', ClientsController::class);
//ruta para crear  empleados
Route::post('/empleado', [ClientsController::class, 'employed']);
//!RUTAS PARA ACTUALIZAR IMAGENES
Route::post('clients/update/{client}', [ClientsController::class, 'update']);
//!...
Route::resource('/attendances', AttendancesController::class);
// tarifa
Route::get('/companies/rates/{id}', [CompaniesController::class, 'rates']);
//sales
Route::resource('/sales', SalesController::class);

// compañias
Route::resource('/companies', CompaniesController::class);

Route::delete('clients/restore/{client}', [ClientsController::class, 'restore']);