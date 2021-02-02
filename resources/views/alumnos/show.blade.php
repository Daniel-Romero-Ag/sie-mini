@extends('layouts.plantilla')
@section('content')
<main class="seccion">
    <h1>Bienvenido {{$paciente->nombre}}</h1>
    <div class="contenedor-citas-perfil">
        <h2>Citas agendadas:</h2>
        <div class="citas-perfil">
            @foreach ($citas as $cita)
                <div class="cita-perfil">
                    <p>Dia: {{$cita->fecha}}</p>
                    <p>Hora: {{$cita->hora}}</p>
                    <p>Doctor: {{$cita->id_doctores}} </p>
                    <a href="{{route('pacientes.edit',$cita->id)}}" class="boton">Editar</a>
                    <a href="" class="boton">Cancelar</a>
                </div>
            @endforeach
            <div class="cita-perfil agendar">
                <a href="{{route('pacientes.edit',1)}}" class="boton" style="margin:  60px 0; font-size:2rem">Agendar Cita</a>
            </div>
        </div>
    </div>
    <div class="contenedor-citas-perfil">
        <h2>Estudios agendados</h2>
        
            <div class="citas-perfil">
            
                @foreach ($estudios as $estudio)
                    
              
                    <div class="cita-perfil">
                        <p>Dia: {{$estudio->fecha}}</p>
                        <p>Hora: {{$estudio->hora}}</p>
                        <p>Doctor: {{$estudio->nombre}} </p>
                    </div>
                    @endforeach
        </div>
    </div>
       
        
</main>
@endsection