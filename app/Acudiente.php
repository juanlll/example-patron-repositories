<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model {
    public $table = 'acudientes';

    public $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'direccion',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombres' => 'string',
        'apellidos' => 'string',
        'direccion' => 'string',
        'telefono' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|min:2|max:11',
        'apellidos' => 'required|min:2|max:11',
        'direccion' => 'required|min:2|max:11',
        'telefono' => 'required|min:2|max:11',
    ];

}
