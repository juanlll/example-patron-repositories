<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombres');
            $table->text('apellidos');
            $table->text('direccion');
            $table->integer('edad');
            $table->JSON('alergias');
            $table->integer('grado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('estudiantes');
    }
}
