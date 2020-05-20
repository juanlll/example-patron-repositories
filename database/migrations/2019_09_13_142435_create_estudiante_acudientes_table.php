<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudianteAcudientesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('est_acu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idAcu')->unsigned();
            $table->foreign('idACu')->references('id')->on('acudientes');
            $table->integer('idEst')->unsigned();
            $table->foreign('idEst')->references('id')->on('estudiantes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('est_acu');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function acudiente() {
        return $this->belongsTo(\App\Acudiente::class, 'idAcu', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estudiante() {
        return $this->belongsTo(\App\Estudiante::class, 'idEst', 'id');
    }
}
