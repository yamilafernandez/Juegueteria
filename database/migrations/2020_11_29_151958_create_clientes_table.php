<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('IdUsuario')->constrained('users');
            $table->string('Apellido');
            $table->string('Nombre');
            $table->string('DNI');
            $table->string('Direccion');
            $table->string('Telefono');
            $table->string('FechaNacimiento');
            $table->string('Localidad');
          
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
