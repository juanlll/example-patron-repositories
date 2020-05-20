<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\CreateAcudienteRequest;
use App\Http\Requests\API\UpdateAcudienteRequest;
use App\Repositories\Acudiente\AcudienteRepository;
use Illuminate\Http\Request;

class AcudienteController extends Controller {

    protected $acudienteRepo;
    public function __construct(AcudienteRepository $acudienteRepository) {
        $this->acudienteRepo = $acudienteRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->acudienteRepo->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAcudienteRequest $request) {
        return $this->acudienteRepo->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $acudiente = $this->acudienteRepo->find($id);
        if (is_null($acudiente)) {
            return response()->json(["message" => "No existe este acudiente!"], 404);
        }
        return response()->json($acudiente);
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
    public function update(UpdateAcudienteRequest $request, $id) {

        $acudiente = $this->acudienteRepo->find($id);
        if (is_null($acudiente)) {
            return response()->json(["message" => "No se puedo encontrar el acudiente"], 404);
        }
        return $this->acudienteRepo->update($acudiente, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $acudiente = $this->acudienteRepo->find($id);
        if (is_null($acudiente)) {
            return response()->json(["message" => "No se puedo encontrar el acudiente"], 404);
        }
        return $this->acudienteRepo->delete($acudiente);
    }
}
