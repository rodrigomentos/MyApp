<?php
namespace App\Http\Services;
use App\Persona;

class PersonaService 
{
    private $model;

    public function __construct()
    {
        $this->model = new Persona;
    }

    public function getModel()
    {
        return $this->model;
    }

    public  function listar ()
    {
        return $this->model::Activos()->get();
    }

    public  function registrar($request)
    {
        $persona = new Persona();
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->documento = $request->documento;
        $persona->edad = $request->edad;
        $persona->save();

        return $persona;
    }

    public function buscarPorId($personaId)
    {
        return $this->model->find($personaId);
    }

    public  function actualizar($personaId,$request)
    {
        $persona = Persona::find($personaId);
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->documento = $request->documento;
        $persona->edad = $request->edad;
        $persona->save();

        return $persona;
    }

    public  function eliminar($personaId)
    {
        Persona::where('id',$personaId)->update(['estado'=>FALSE]);
    }
}