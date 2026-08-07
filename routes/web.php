<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;

// Show form on both the home path and /enquiry
Route::get('/', [EnquiryController::class, 'create'])->name('enquiry.create');
Route::get('/enquiry', [EnquiryController::class, 'create']);

// Handle form submission
Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');