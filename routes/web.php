<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [EnquiryController::class, 'create'])->name('enquiry.create');

// Enquiry
Route::get('/enquiry', [EnquiryController::class, 'create']);
Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');