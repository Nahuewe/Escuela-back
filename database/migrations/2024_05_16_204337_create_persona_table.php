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
        Schema::create('persona', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni')->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_cursado')->nullable();
            $table->string('edad')->nullable();
            $table->unsignedBigInteger('sexo_id')->nullable();
            $table->foreign('sexo_id')->references('id')->on('sexo');
            $table->string('telefono')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('enfermedad')->nullable();
            $table->string('becas')->nullable();
            $table->unsignedBigInteger('formacion_id');
            $table->foreign('formacion_id')->references('id')->on('docente');
            $table->string('observacion')->nullable();
            $table->unsignedBigInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona');
    }
};
