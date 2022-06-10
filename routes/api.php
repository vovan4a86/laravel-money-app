<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/all', [\App\Http\Controllers\PaymentsController::class, 'index']);

Route::resource('incomes', \App\Http\Controllers\PaymentsController::class);
Route::resource('outcomes', \App\Http\Controllers\OutcomeController::class);

//Route::get('/incomes', [\App\Http\Controllers\IncomeController::class, 'index']);
Route::get('/incomes/{id?}', [\App\Http\Controllers\IncomeController::class, 'show']);
Route::get('/incomes/{id}/delete', [\App\Http\Controllers\IncomeController::class, 'delete']);
//Route::get('/income/create', [\App\Http\Controllers\IncomeController::class, 'store']);

//Route::get('/outcomes', [\App\Http\Controllers\OutcomeController::class, 'index']);
//Route::get('/outcome/{id}', [\App\Http\Controllers\OutcomeController::class, 'show']);



