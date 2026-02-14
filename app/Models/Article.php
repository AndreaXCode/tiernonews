<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ["id", "title", "content", "readers"];

    //Relación 1-n con Journalist
    public function Journalist() {
        return $this->belongsTo(Journalist::class);

    }
}