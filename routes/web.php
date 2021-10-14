<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;



Route::get('/', [ContactController::class, 'index']);
Route::get('/contact/manage', [ContactController::class, 'managePage']);
// Route::get('/contact/search', [ContactController::class, 'search']);
Route::post('/contact/create', [ContactController::class, 'create']);
Route::get('/contact/create', [ContactController::class, 'confirm']);
Route::post('/contact/send', [ContactController::class, 'send']);
Route::post('/contact/destroy', [ContactController::class, 'destroy'])->name('contact.destroy');
Route::get('/contact/complete', [ContactController::class, 'complete']);