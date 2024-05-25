<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');



// Unprotected Route

Route::post('register', [ApiController::class, 'Register']);

Route::post('login', [ApiController::class, 'Login']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('profile', [ApiController::class, 'Profile']);
    Route::get('logout', [ApiController::class, 'Logout']);
});