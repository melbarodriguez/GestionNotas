<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id(); // SIEMPRE SE PONE (APARTE SE PONE SOLO (EN LA COMPU)) 
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->string('nombre_usuario')->unique();
            $table->integer('telefono'); // INTEGER ES COMO DECIR INT (SOLO NUMEROS)
            $table->timestamps(); // SIEMPRE SE PONE (APARTE SE PONE SOLO (EN LA COMPU)) 
            // FECHA DE CREACION Y FECHA ACTUALIZACION
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
