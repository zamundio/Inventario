<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Delegados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Delegados', function (Blueprint $table) {
            
            $table->timestamps();
			$table->softDeletes();
			$table->integer('Codigo')->nullable();
			$table->string('Nombre')->nullable();
			$table->string('Primer Apellido')->nullable();
			$table->string('Segundo Apellido')->nullable();
			$table->string('Centro de Coste')->nullable();
			$table->date('Fecha de Alta')->nullable();
			$table->string('Email')->nullable();
			$table->string('Compañia')->nullable();
			$table->string('Dirección')->nullable();
			$table->string('Población')->nullable();
			$table->string('Provincia')->nullable();
			$table->string('Telefono')->nullable();
			$table->string('Genero')->nullable();
			$table->date('Fecha Baja')->nullable();
			$table->string('DNI')->nullable();
			$table->string('Posicion')->nullable();
			$table->string('Zona')->nullable();
			$table->string('Area')->nullable();
			$table->string('SubArea')->nullable();
			$table->integer('Gerente')->nullable();
			$table->string('Linea')->nullable();
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Delegados');
    }
}
