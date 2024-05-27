<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('add-category', [CategoryController::class, "AddCategory"]);
Route::post('store-category', [CategoryController::class, "StoreCategory"])->name("store.category");
