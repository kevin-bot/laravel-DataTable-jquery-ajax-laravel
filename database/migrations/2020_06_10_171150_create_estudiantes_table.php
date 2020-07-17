<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{

    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 10);
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
