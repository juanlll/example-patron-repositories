<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model {
    public $table = 'estudiantes';

    public $fillable = [
        'nombres',
        'apellidos',
        'edad',
        'grado',
        'direccion',
        'alergias',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombres' => 'string',
        'apellidos' => 'string',
        'edad' => 'integer',
        'grado' => 'integer',
        'direccion' => 'string',
        'alergias' => 'JSON',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|min:2|max:11',
        'apellidos' => 'required|min:2|max:11',
        'direccion' => 'required|min:2|max:25',
        'grado' => 'required|min:2|max:11',
        'alergias' => 'required',
        'edad' => 'required|min:2|max:10',
    ];

    public function acudientes() {
        return $this->belongsToMany('App\Acudiente', 'est_acu', 'idEst', 'idAcu');
    }
}
