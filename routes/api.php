<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentApprovalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentReportController;
use App\Http\Controllers\TravelPaymentController;
use Illuminate\Support\Facades\Route;

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

Route::post('/sanctum/token', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group( function () {
    Route::apiResource('payments', PaymentController::class);
    Route::apiResource('travel_payments', TravelPaymentController::class);

    Route::post('/approve_payment', [PaymentApprovalController::class, 'approvePayment']);
    Route::post('/payments_report', [PaymentReportController::class, 'report']);
});
