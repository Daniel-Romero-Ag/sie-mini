@extends('layouts.plantilla')
@section('content')
<main class="seccion">
    <h1>Bienvenida {{$materias[0]["nombre"]}} {{$materias[0]["apellido_paterno"]}} {{$materias[0]["apellido_materno"]}}</h1>
    
    <div class="contenedor-citas-perfil">
        <h2>Calificaciones</h2>
        <div class="citas-perfil">
            
            @foreach ($materias as $materia)
            
            
              @isset($materia->materia)
              <div class="cita-perfil">
              
                    <p>Materia: {{$materia->materia}}</p>
                    <p>Alumno: {{$materia->no_control_del_alumno}}</p>
                    <p>Unidad 1: {{$materia->unidad_1}}</p>
                    <p>Unidad 2: {{$materia->unidad_2}}</p>
                    <p>Unidad 3: {{$materia->unidad_3}}</p>
                    <p>Promedio: {{$materia->promedio}}</p>         
                    "{{$materia->email}}"
                    <form action="{{route('calificaciones.show')}}" method="get">
                        @csrf
                                <input type="hidden" id="no_control_alumno" name="calificaciones_id" value="{{$materia->calificaciones_id}}">
                                <input type="hidden" id="no_control_alumno" name="no_control_alumno" value="{{$materia->no_control_del_alumno}}">
                                <input type="hidden" id="materia" name="materia" value="{{$materia->materia}}">
                                <input type="hidden" id="unidad_1" name="unidad_1" value="{{$materia->unidad_1}}">
                                <input type="hidden" id="unidad_2" name="unidad_2" value="{{$materia->unidad_2}}">
                                <input type="hidden" id="unidad_3" name="unidad_3" value="{{$materia->unidad_3}}">
                                <input type="hidden" id="promedio" name="promedio" value="{{$materia->promedio}}">
                                <input type="hidden" id="email" name="email" value="{{$materia->correo}}">
                                <input type="hidden" id="password" name="password" value="{{$materia->contrasenia}}">
                        <input type="submit" value="Editar Calificaciones" id="Registrarse">
                    </form>
                </div>
                    @endisset
                
            @endforeach
            @isset($materias[0]["hay_otras"])
            <div class="cita-perfil">
                <P>No hay materias a su cargo</P>
            </div>
            @endisset
        </div>   
    {{-- @foreach ($materias as $materia)
        
       {{$materia}}
    @endforeach --}}
</main>

@endsection