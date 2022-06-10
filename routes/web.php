<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentsController;

Route::get('/', [PaymentsController::class, 'index']);

Route::get('/payments/{type}/all', [PaymentsController::class, 'getAllPayments']);
Route::get('/payments/{type}/all', [PaymentsController::class, 'getAllPayments']);

Route::get('/payments/{id}/delete', [PaymentsController::class, 'destroy']);
Route::get('/payments/{id}/update', [PaymentsController::class, 'update']);

Route::resource('/payments', PaymentsController::class);


//Route::get('/payments/{id?}', [PaymentsController::class, 'addIncomeView'])
//        ->where('id', '[0-9]+');
//Route::post('/payments/{id?}', [PaymentsController::class, 'addIncome'])
//        ->where('id', '[0-9]+');

//Route::get('/add-out', [PaymentsController::class, 'addOutcomeShow']);
