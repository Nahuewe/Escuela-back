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
        Schema::create('formacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formacion_id')->nullable();
            $table->foreign('formacion_id')->references('id')->on('docente');
            $table->date('fecha_cursado')->nullable();
            $table->date('fecha_finalizacion')->nullable();
            $table->string('observaciones')->nullable();
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('persona');
            $table->timestamps();
            $table->softDeletes();
        });        
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formacion');
    }
};
