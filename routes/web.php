<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

// ListingController index() method
Route::get('/', [ListingController::class, 'index']);

// Show create Listing Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit form for Listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update the Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete a Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware(('auth'));

// Single listing with Route Model Binding 
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new User
Route::post('/users', [UserController::class, 'store']);

// Log user Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


