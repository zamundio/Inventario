<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GerentesDeArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Gerentes_area', function (Blueprint $table) {
            
            $table->timestamps();
			$table->softDeletes();
			$table->string('Codigo')->nullable();
			$table->string('Nombre')->nullable();
			$table->string('Primer Apellido')->nullable();
			$table->string('Segundo Apellido')->nullable();
			$table->string('Zona')->nullable();
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Gerentes_area');
    }
}
