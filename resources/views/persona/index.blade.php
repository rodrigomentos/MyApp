@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Lista Personas</div>

                <div class="card-body">

                    <div class="pull-right">
                        <a href="/persona/nuevo" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus"></i> Agregar</a>
                    </div>
                    <br>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Nombres y Apellidos</th>
                            <th>Documento</th>
                            <th>Edad</th>
                            <th>Opción</th>
                        </thead>
                        <tbody>
                            @foreach($personas as $persona)
                                <tr>
                                <td>{{$persona->id}}</td>
                                <td>{{$persona->getNombresApellidos()}}</td>
                                <td>{{$persona->documento}}</td>
                                <td>{{$persona->edad}}</td>
                                <td>
                               
                                <form method="POST" action="{{ route('eliminarPersona',$persona->id) }}" onsubmit="return confirm('¿Estás seguro de eliminar a esta personas?')">
                                 @csrf
                                 <a class="btn btn-sm btn-primary" href="/persona/editar/{{$persona->id}}" data-toggle="tooltip" title="Editar" ><span class="glyphicon glyphicon-pencil"></span></a>
                                 <button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Eliminar" > <span class="glyphicon glyphicon-trash"></span></button>
                                </form>
                                
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection