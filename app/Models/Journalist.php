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

    public function __toString() {

        if ($this->name != null) {
            return "$this->name
            - $this->surmane
            - $this->email
            - $this->password";
        }
        
    }
}
