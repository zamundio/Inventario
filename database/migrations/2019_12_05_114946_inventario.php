<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class log_movimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_movimientos', function (Blueprint $table) {
            
            $table->timestamps();
			$table->softDeletes();
			$table->string('NS')->->unique();
			$table->integer('Id_LocOld')->nullable();
			$table->integer('Id_LocNew')->nullable();
			$table->integer('Id_EstadoOld')->nullable();
			$table->integer('Id_EstadoNew')->nullable();
			$table->string('ObservacionesOld')->nullable();
			$table->string('ObservacionesNew')->nullable();
			$table->string('CodigoOld')->nullable();
			$table->string('CodigoNew')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_movimientos');
    }
}
