<?php

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


//get /article  --> dev all
//get /article /{id}  --> dev article