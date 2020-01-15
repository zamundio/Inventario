<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createlineas4G extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineas_4G', function (Blueprint $table) {
            $table->string('codigo')->unique();
            $table->string('movil');
            $table->string('sim')->unique();
            $table->string('pin')->nullable();
            $table->string('puk');
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
        Schema::dropIfExists('lineas_4G');
    }
}
