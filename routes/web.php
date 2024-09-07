<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test-db-connection', [App\Http\Controllers\TestController::class, 'testConnection']);

