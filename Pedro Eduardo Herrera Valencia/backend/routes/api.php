<?php

use App\Http\Controllers\Api\V1\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class);
