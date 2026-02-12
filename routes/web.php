<?php

use App\Http\Controllers\JournalistController;
use App\Http\Controllers\ArticleController;
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

Route::get("/journalist", [JournalistController::class, "index"])->name("journalist");

Route::get("/name/{name}", [JournalistController::class, "sayName"]);

//...

//Petición GET
//Esto va a devolver la vista con el formulario de creación
Route::get("/journalist/create", [JournalistController::class, "create"])->name("journalist.create");
//Esto es para guardar el journslist con los datos rellenados del form de create  -->Petición POST

Route::post("/journalist", [JournalistController::class, "store"])->name("journalist.store");

Route::get("/journalist/{id}", [JournalistController::class, "show"]);


Route::get("/journalist/{id}/edit", [JournalistController::class, "edit"])->name('journalist.edit');
Route::put("/journalist/{id}", [JournalistController::class, "update"])->name('journalist.update');


Route::delete("/journalist/{id}", [JournalistController::class, "destroy"])->name('journalist.destroy');


//get /article  --> dev all
//get /article /{id}  --> dev article


//Articles
Route::resource("/article", ArticleController::class);


//Route::get("/article/create", [ArticleController::class, "store"])->name('article.create');