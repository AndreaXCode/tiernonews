<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journalist extends Model
{
    private int $id;
    private string $name;
    private string $surmane;
    private string $email;
    private string $password;
}
