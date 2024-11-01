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
        Schema::create('tipo_tramites', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string('nombre');
            $table->integer('precio');
            $table->tinyInteger('status')->comment('1: Activo, 2: Inactivo, 3: eliminado')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_tramites');
    }
};
