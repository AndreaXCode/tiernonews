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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("title");
            $table->longText("content");
            $table->integer("readers");
            //journalist_id. Si la tabla a la que hace referencia no se llamara journalists, o si el nombre de la columna no se llamara journalist_id, entonces
            //$table->foreignId("journalist_id")->constrained("jounalists");
            $table->foreignId("journalist_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
