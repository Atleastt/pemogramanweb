<?php

use App\Http\Controllers\api\CarsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('cars',CarsController::class);