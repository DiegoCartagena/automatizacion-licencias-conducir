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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string('id_usuario');
            $table->string('id_documento');
            $table->string('id_pago');
            $table->string('id_estado');
            $table->string('usuario_actualizacion');
            $table->timestamp('fecha_agendada')->nullable();
            $table->string('id_res_examen');
            $table->string('id_tipo_tramite');
            $table->string('step')->default('inicio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
