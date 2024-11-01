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
        Schema::create('tipo_licencias', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string('nombre');
            $table->foreignId('id_estado');
            $table->tinyInteger('curso')->comment('1: No requiere, 2: requiere')->default(1)->nullable();
            $table->longText('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_licencias');
    }
};
