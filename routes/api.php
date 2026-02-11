<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JournalistApiController;
use App\Http\Controllers\ArticleApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//endpoint para búsqueda de prueba
Route::get('/search', [JournalistApiController::class, "search"]);

Route::get("/journalist/{id}", [JournalistApiController::class, "show"]);

Route::post("/journalist", [JournalistApiController::class, "store"]);

Route::put("/journalist/{id}", [JournalistApiController::class, "update"]);

Route::delete("/journalist/{id}", [JournalistApiController::class, "destroy"]);


// para eliminiar artículos por readers quiero hacer un HTTP DELETE
// xej: http://127.0.0.1:8000/api/delete?minReaders=5&maxReaders=9
// o esto: http://127.0.0.1:8000/api/delete?minReaders=5, en este caso, se eliminan todos los artículos de menos de los readers indicados en minReaders
Route::delete('/delete', [ArticleApiController::class, 'deleteByReaders']);
//--> Probar en clase, al quitar // me da error