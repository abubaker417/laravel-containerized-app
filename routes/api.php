<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

use App\Http\Controllers\EfsTestController;

Route::get('/health',    [EfsTestController::class, 'health']);
Route::get('/efs/write', [EfsTestController::class, 'write']);
Route::get('/efs/read',  [EfsTestController::class, 'read']);