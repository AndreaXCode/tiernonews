<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalistApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/journalist/{id}", [JournalistApiController::class, "show"]);


Route::post("/journalist", [JournalistApiController::class, "store"]);


Route::put("/journalist/{id}", [JournalistApiController::class, "update"]);


Route::delete("/journalist/{id}", [JournalistApiController::class, "destroy"]);
