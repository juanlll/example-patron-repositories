<?php

namespace App\Http\Controllers;

use App\Repositories\Estudiante\EstudianteRepository;
use Illuminate\Http\Request;

class EstudianteController extends Controller {

    protected $estudianteRepo;
    public function __construct(EstudianteRepository $estudianteRepository) {
        $this->estudianteRepo = $estudianteRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->estudianteRepo->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        return $this->estudianteRepo->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $estudiante = $this->estudianteRepo->find($id);
        if (is_null($estudiante)) {
            return response()->json(["message" => "No se encontro el estudiante"], 404);
        }
        $estudiante->acudientes;
        return response()->json($estudiante);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $estudiante = $this->estudianteRepo->find($id);
        if (is_null($estudiante)) {
            return response()->json(["message" => "No se encontró el estudiate!"], 404);
        }
        return $this->estudianteRepo->update($estudiante, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $estudiante = $this->estudianteRepo->find($id);
        if (is_null($estudiante)) {
            return response()->json(["message" => "No se encontró el estudiate!"], 404);
        }
        return $this->estudianteRepo->delete($estudiante);
    }
}
