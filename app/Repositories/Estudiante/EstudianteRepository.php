<?php

namespace App\Repositories\Estudiante;
use App\Estudiante;
use App\Repositories\BaseRepository;

class EstudianteRepository extends BaseRepository {

    public function getModel() {
        return new Estudiante();
    }

}