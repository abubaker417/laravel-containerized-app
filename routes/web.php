<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\DocumentController;

Route::resource('documents', DocumentController::class)->only([
    'index', 'create', 'store', 'destroy'
]);
Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');