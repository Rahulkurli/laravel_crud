<?php

use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

Route::get('/', [productController::class, 'index'])->name("products.index");
Route::get('products/create', [productController::class, 'create'])->name("products.create");
Route::post('products/store', [productController::class, 'store'])->name("products.store");
Route::get('products/{id}/edit', [productController::class, 'edit']);
Route::put('products/{id}/update', [productController::class, 'update']);
Route::delete('products/{id}/delete', [productController::class, 'destroy']);
Route::get('products/{id}/show', [productController::class, 'show']);
