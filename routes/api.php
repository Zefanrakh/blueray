<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where yoSu can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json([
            'user' => $request->user()
        ]);
    });

    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index']); // List all users (admin-only)
        Route::get('/{userId}', [UserController::class, 'show']); // Show specific user
        Route::put('/{userId}', [UserController::class, 'update']); // Update user
        Route::delete('/{userId}', [UserController::class, 'destroy']); // Delete user
    });


    Route::prefix('/shipments')->group(function () {
        Route::post('/', [ShipmentController::class, 'createShipment']);
        Route::get('/{shipmentId}', [ShipmentController::class, 'show'])->middleware(["shipment.access"]);
    });

    Route::prefix('/dashboard')->group(function () {
        Route::get('/admin', [DashboardController::class, 'adminDashboard'])->middleware(['role:admin']);
        Route::get('/user/{userId}', [DashboardController::class, 'userDashboard']);
    });

    Route::prefix('/couriers')->group(function () {
        Route::get('/', [CourierController::class, 'getCouriers']);
    });
});
