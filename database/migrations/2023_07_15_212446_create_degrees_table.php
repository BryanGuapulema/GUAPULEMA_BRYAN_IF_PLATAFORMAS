<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreesTable extends Migration
{
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('degree_name', 50);
            $table->string('state')->default('Activo');
            $table->string('faculty');
            $table->timestamps();
            $table->unsignedBigInteger('user_modifica')->nullable();
            
            $table->foreign('user_modifica')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('degrees');
    }
}

