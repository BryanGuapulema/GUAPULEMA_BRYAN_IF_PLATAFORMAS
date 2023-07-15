<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code', 10);
            $table->string('lastname', 50);
            $table->string('firstname', 50);
            $table->unsignedBigInteger('user_id');
            $table->string('state')->default('Activo');
            $table->date('last_logging_at')->default(date('Y-m-d'));
            $table->unsignedBigInteger('user_modifica')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_modifica')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}


