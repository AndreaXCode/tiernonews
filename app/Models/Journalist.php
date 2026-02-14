<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journalist extends Model
{
    /*private int $id;
    private string $name;
    private string $surmane;
    private string $email;
    private string $password;*/

    //Aquí declaramos los atributos del modelo para que puedean ser rellenados
    //automanticamente al leer de la DB
    //Este fillable lo que hace es crear un constructor que recibe un solo parámetro:
    //un array asociativo con las claves los nombres de los atributos
    protected $fillable = ["id", "name", "surname", "email", "password"];

    
    //Un periodista tiene varios articulos (1-n)
    public function articles() {
        return $this->hasMany(Article::class);
    }
}
