<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoveController;

// Hapus atau beri komentar pada route welcome agar tidak bentrok
// Route::get('/', function () {
//     return view('welcome');
// });

// Perbaikan: Gunakan ::class dan hapus .php
Route::get('/', [LoveController::class, 'index']);