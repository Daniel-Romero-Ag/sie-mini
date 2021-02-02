@extends('layouts.plantilla')
@section('content')
<style>
    .cita{
        border: 2px solid black;
    }
.citas{
    display: grid;
    grid-template-columns: repeat(3,1fr);

}
main h2{
    background-color: gray;
}
ul a{
    text-decoration: none;
    color: black;
    text-align: center;
    align-items: center;
}
</style>
<main class="seccion">
    <h1>Doctores en esta especialidad:</h1>

    <ul class="citas">
  @foreach ($doctores as $doctor)
      <li class="cita">
  <p>Nombre: {{$doctor->nombre}} {{$doctor->apellido}}</p>
  <p>
  Resumen:{{$doctor->resumen}}</p>
  <p>
  Descripcion:{{$doctor->descripcion}}
</p>
</li>
  @endforeach
  <a href="{{route('index')}}" class="cita">Regresar</a>
</ul>
</main>

@endsection