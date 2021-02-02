@extends('layouts.plantilla')
@section('content')
<main class="seccion">
    <h1>Bienvenida {{$materias[0]["nombre"]}} {{$materias[0]["apellido_paterno"]}} {{$materias[0]["apellido_materno"]}}</h1>
    
    <div class="contenedor-citas-perfil">
        <h2>Calificaciones</h2>
        <div class="citas-perfil">
            @foreach ($materias as $materia)
           
            <div class="cita-perfil">
                    <p>Materia:
                         @isset($materia->materia)
                        {{$materia->materia}}
                        @endisset</p>
                    <p>Maestro:
                        
                       </p>
                    <p>Unidad 1: 
                        @isset($materia->unidad_1)
                        {{$materia->unidad_1}}
                        @endisset</p>

                    </p>
                    <p>Unidad 2: 
                        @isset($materia->unidad_2)
                        {{$materia->unidad_2}}
                        @endisset</p>

                    </p><p>Unidad 3: 
                        @isset($materia->unidad_3)
                        {{$materia->unidad_3}}
                        @endisset</p>

                    </p>
                    <p>Promedio: @isset($materia->promedio)
                        {{$materia->promedio}}
                        @endisset</p></p>
                    <p>Numero de la materia:
                        
                        @isset($materia->id_materia)
                        {{$materiasId[]=$materia->id_materia}}
                        @endisset</p>
                        </p>         
                </div>
            @endforeach
        </div>
        
           
        <h2>Materias disponibles</h2>
        <div class="citas-perfil">
        @foreach ($materiasDisp as $materiaDisp)
        
            <div class="cita-perfil">
                <p>Materia: {{$materiaDisp->nombre}}</p>
                <p>Creditos: {{$materiaDisp->creditos}}</p>
                
            </div>
        
        @endforeach
        <form action="{{route('materias.agregar')}}">
            
            <input type="hidden" name="id_user" value="{{$materias[0]["id_user"]}}">
           
             El valor del id usuario es:{{$materias[0]["id_user"]}} 
            <input type="submit" value="Agregar materias">
        </form>
    </div>
</main>

@endsection