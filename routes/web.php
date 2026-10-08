<?php

use App\Http\Controllers\TasObatController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/tas/demo');

// Halaman yang dibuka saat barcode dipindai
Route::get('/tas/{slug}', [TasObatController::class, 'show'])
    ->where('slug', '[a-z0-9\-]+')
    ->name('tas.show');

// Halaman untuk membuat & mencetak barcode (QR) tas tersebut
Route::get('/tas/{slug}/qr', [TasObatController::class, 'qr'])
    ->where('slug', '[a-z0-9\-]+')
    ->name('tas.qr');
