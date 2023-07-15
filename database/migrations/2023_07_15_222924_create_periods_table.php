<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodsTable extends Migration
{
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->string('period_name', 30);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('state')->default('Activo');
            $table->timestamps();
            $table->unsignedBigInteger('user_modifica')->nullable();
            $table->foreign('user_modifica')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('periods');
    }
}
