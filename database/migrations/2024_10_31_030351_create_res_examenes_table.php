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
        Schema::create('res_examenes', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string('nombre_examen');
            $table->foreignId('id_estado')->nullable();
            $table->integer('porcentaje')->nullable();
            $table->integer('puntaje')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('res_examenes');
    }
};
