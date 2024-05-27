<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
})->middleware('role:admin');


Route::get('add-category', [CategoryController::class, "AddCategory"]);
Route::post('store-category', [CategoryController::class, "StoreCategory"])->name("store.category");
