<?php

use App\Modules\web\Categories\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoriesController::class)->group(function () {
    Route::get('menu', 'index');
});
