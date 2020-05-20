<?php

namespace App\Repositories\Acudiente;
use App\Acudiente;
use App\Repositories\BaseRepository;

// HEREDO del PADRE BASE
class AcudienteRepository extends BaseRepository {

    public function getModel() {
        return new Acudiente();
    }

}