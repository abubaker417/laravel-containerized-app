<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

use App\Http\Controllers\DocumentController;

Route::resource('documents', DocumentController::class)->only([
    'index', 'create', 'store', 'destroy'
]);
Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');


Route::get('/my-ip', function () {
    return [
        'ip' => request()->ip(),
        'real_ip' => $_SERVER['REMOTE_ADDR'] ?? 'not set',
        'forwarded_for' => request()->header('X-Forwarded-For') ?? 'not set',
        'telescope_allowed' => env('TELESCOPE_ALLOWED_IPS'),
    ];
});