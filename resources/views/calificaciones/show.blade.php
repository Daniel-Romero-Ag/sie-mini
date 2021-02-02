@extends('layouts.plantilla')
@section('content')
<main class="seccion">
    {{-- <h1>Bienvenida {{$requests[0]["nombre"]}} {{$requests[0]["apellido_paterno"]}} {{$requests[0]["apellido_materno"]}}</h1> --}}
    
    <div class="contenedor-citas-perfil">
        <h2>Calificaciones</h2>
        
        
            <div class="cita-perfil">

                <form style="display:grid; grid-template-columns: 1fr 1fr;"action="{{route('calificaciones.edit')}}" method="post">
                    @csrf

                    {{-- <label for="no_control_alumno">Alumno:</label>         --}}
                    {{-- <input type="text" id="no_control_alumno" name="calificaciones_id" value="{{$request->calificaciones_id}}"> --}}
                    <label for="no_control_alumno">Alumno:</label>
                    <input type="text" id="no_control_alumno" name="no_control_alumno" value="{{$request->no_control_alumno}}" readonly>
                    <label for="materia">Materia:</label>
                    <input type="text" id="materia" name="materia" value="{{$request->materia}}" readonly>
                    <label for="unidad_1">Unidad 1:</label>
                    <input type="text" id="unidad_1" name="unidad_1" value="{{$request->unidad_1}}">
                    <label for="unidad_2">Unidad 2</label>
                    <input type="text" id="unidad_2" name="unidad_2" value="{{$request->unidad_2}}">
                    <label for="unidad_3">unidad 3:</label>
                    <input type="text" id="unidad_3" name="unidad_3" value="{{$request->unidad_3}}">
                    <label for="promedio">Promedio:</label>
                    <input type="text" id="promedio" name="promedio" value="{{$request->promedio}}" readonly>
                    <input type="submit" value="Editar Calificaciones" id="Registrarse">
                    
                    <input type="hidden" name="calificaciones_id" value="{{$request->calificaciones_id}}">
                    
                    
                    
                </form>
                <form action="{{route('maestros.login2')}}" method="get">
                    <input type="hidden" name="correo" value="{{$request->email}}">
                    <input type="hidden" name="contrasenia" value="{{$request->password}}">
                    <input type="submit" value="Volver" id="Registrarse">
                
                </form>
                   
                </div>
            
         
    {{-- @foreach ($requests as $request)
        
       {{$request}}
    @endforeach --}}
</main>

@endsection