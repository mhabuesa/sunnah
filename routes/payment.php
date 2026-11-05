<?php

use App\Http\Controllers\Payment\PaymentController;
use Illuminate\Support\Facades\Route;


Route::controller(PaymentController::class)->name('payment.')->prefix('payment')->group(function () {
    Route::post('/success', 'success')->name('success');
    Route::post('/failure', 'failure')->name('failure');
    Route::post('/cancel', 'cancel')->name('cancel');
    Route::post('/ipn', 'ipn')->name('ipn');
});