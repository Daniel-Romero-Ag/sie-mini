@extends('layouts.plantilla')
@section('content')
<style>
    h1{
        margin-bottom: 50px;
        text-align: center;
    }
    main a{margin-right:10px;font-size: 2em;background-color: gray; padding:5px 10px; text-decoration: none;text-align: center;color:black;}
    .botones{
        text-align: center;
    }
</style>
<main class="seccion">
    <h1>Alumno agregado con exito</h1>
   <div class="botones">
    <a href="/">Volver a la pagina de inicio</a>
    <a href="{{route('alumnos.loginView')}}">Iniciar sesion</a>
</div>
</main>

@endsection