<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PersonaService;

class PersonaController extends Controller
{
    private $personaService;

    public function __construct()
    {
        $this->personaService = new PersonaService();
    }

    public function index()
    {
        $personas =  $this->personaService->listar();

        return view('persona.index',compact('personas'));
    } 

    public function nuevo()
    {
        $persona =  $this->personaService->getModel();

        return view('persona.crear_or_editar',compact('persona'));
    }

    public function registrar(Request $request)
    {
        $this->validate($request,[
            'nombres' =>'required|string',
            'apellidos' => 'required|string',
            'documento' => 'required|string|digits_between:8,8',
            'edad' => 'required|integer|min:1|max:100'
        ]);
        try{

            $this->personaService->registrar($request);
           
            return redirect('personas');

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    public function editar($personaId)
    {
        $persona =  $this->personaService->buscarPorId($personaId);

        return view('persona.crear_or_editar',compact('persona'));
    }

    public function actualizar($personaId, Request $request)
    {
        if($personaId<=0)
        {
            return redirect('personas');
        }

        $persona =  $this->personaService->buscarPorId($personaId);
       
        if(!$persona)
        {
            return redirect('personas');
        }

        $this->validate($request,[
            'nombres' =>'required|string',
            'apellidos' => 'required|string',
            'documento' => 'required|string|digits_between:8,8',
            'edad' => 'required|integer|min:1|max:100'
        ]);

        try{

            $this->personaService->actualizar($personaId,$request);
           
            return redirect('personas');

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    public function eliminar($personaId, Request $request)
    {
        if($personaId<=0)
        {
            return redirect('personas');
        }
        
        try{

            $this->personaService->eliminar($personaId);
           
            return redirect('personas');

        }catch(\Exception $e){
            return $e->getMessage();
        }

    }
}
