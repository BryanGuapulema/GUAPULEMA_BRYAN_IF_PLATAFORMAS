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
        Schema::create('employee_degrees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_employee');
            $table->unsignedInteger('id_degree');
            $table->unsignedBigInteger('id_period');
            $table->date('date')->default(date('Y-m-d'));
            $table->string('state')->default('Activo');
            $table->timestamps();
            $table->unsignedBigInteger('user_modifica')->nullable();

            $table->foreign('id_employee')->references('id')->on('employees');
            $table->foreign('id_degree')->references('id')->on('degrees');
            $table->foreign('id_period')->references('id')->on('periods');
            $table->foreign('user_modifica')->references('id')->on('users');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees_degrees');
    }
};
