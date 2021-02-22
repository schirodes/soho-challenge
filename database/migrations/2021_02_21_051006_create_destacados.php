<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestacados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destacados', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->string("parrafo");
            $table->string("color_titulo");
            $table->string("color_background");
            $table->string("color_button");
            $table->string("color_button_text");
            $table->string("color_parrafo");
            $table->string("color_hash");
            $table->string("path_logo");
            $table->string("path_display");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destacados');
    }
}
