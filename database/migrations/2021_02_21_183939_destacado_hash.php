<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DestacadoHash extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destacado_hashes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("destacado_id");
            $table->string("hash");
            $table->timestamps();
        });

        Schema::table("destacado_hashes", function(Blueprint $table){
            $table->foreign("destacado_id")->references("id")->on("destacados");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destacado_hashes');
    }
}
