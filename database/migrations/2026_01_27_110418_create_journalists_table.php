<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('journalists', function (Blueprint $table) {
            $table->id();  //primary key auto_increment
            $table->timestamps();  //crea 2 columnas, create_at update_at

            //Mis columnas:
            $table->string("name");
            $table->string("surname")->nullable(true);
            $table->string("email")->unique();
            $table->string("password");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journalists');
    }
};