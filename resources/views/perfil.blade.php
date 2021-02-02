@extends('layouts.plantilla')
@section('content')
<style>
    .cita{
        border: 2px solid black;
    }
.citas{
    display: grid;
    grid-template-columns: repeat(5,1fr);

}
main h2{
    background-color: gray;
}
</style>
<main class="seccion">
   <h1>Bienvenido {{$usuario["nombre"]}}</h1>
   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum recusandae et repudiandae quia! Corporis nihil sapiente amet, ipsa sed dolorem ullam voluptates inventore est harum perspiciatis neque vel fugiat laboriosam.</p>
   <h2>Sus citas:</h2> 
<div class="citas">
   @foreach ($citas as $cita)
   <div class="cita">
        <p>Doctor: {{$cita["nombre"]}}</p>
        <p>Fecha: {{$cita["fecha"]}}</p>
        <p>Hora: {{$cita["hora"]}}</p>
    </div>
    @endforeach
    <div class="cita">
        <form action="{{route("agendar")}}" method="POST">
        @csrf
        <input type="hidden" name="id_paciente" value="{{$usuario["id"]}}">
            <input type="submit" value="Agendar Cita">
        </form>
    </div>
</div>
</main>

@endsection