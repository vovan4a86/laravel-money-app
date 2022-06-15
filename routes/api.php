<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ApiController;
use App\Http\Controllers\TypesController;


Route::resource('payments', ApiController::class)->except(['create', 'edit']);
Route::resource('types', TypesController::class)->except(['create', 'edit']);

