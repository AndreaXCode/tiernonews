<?php

use App\Http\Controllers\JournalistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hola", function() {
    return "hola mundo!";
});


Route::get("/hola/{name}", function($name) {
    return "hola $name";
});

Route::get("/journalist", [JournalistController::class, "index"]);

Route::get("/name/{name}", [JournalistController::class, "sayName"]);


//get /article  --> dev all
//get /article /{id}  --> dev article