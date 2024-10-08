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
        Schema::create('docente', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('dni');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('domicilio')->nullable();
            $table->date('fecha_docencia')->nullable();
            $table->date('fecha_cargo')->nullable();
            $table->string('situacion')->nullable();
            $table->string('formacion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('observacion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente');
    }
};
