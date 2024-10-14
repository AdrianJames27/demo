<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [OrderController::class, 'index']);
Route::post('/search', [OrderController::class, 'search_order']);
Route::get('/order_details', [OrderController::class, 'order_details']);