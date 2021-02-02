@extends('layouts.plantilla')
@section('content')
<main class="seccion">
    <h1>Registro</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est autem cumque officia, perspiciatis assumenda earum ipsa repudiandae quasi ab quibusdam voluptates iste animi laudantium aut perferendis corporis, fugit debitis quo!</p>
    <form action="{{route('alumnos.store')}}" class="registrUsuario" method="post" id="formulario-registro">
        @csrf
        <div class="campos">
        <fieldset>
        <legend>Datos Personales</legend>
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
            </div>
            @error('nombre')
                {{$message}}
            @enderror
            <div class="campo">
                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" id="apellido_paterno" name="apellido_paterno">
            </div>
            @error('contraseña')
                {{$message}}
            @enderror
            <div class="campo">
                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" id="apellido_materno" name="apellido_materno">
            </div>
            @error('edad')
                {{$message}}
            @enderror
            <div class="campo">
                <label for="telefono">Telefono:</label>
                <input type="tel" id="telefono" name="telefono">
            </div>
            @error('telefono')
                {{$message}}
            @enderror
            <div class="campo">
                <label for="email">Email:</label>
                <input type="mail" id="email" name="email">   
            </div>
            @error('id_sexos')
                {{$message}}
            @enderror
            <div class="campo">
                <label for="password">Contraseña:</label>
                <input type="tel" id="password" name="password">
            </div>
        </fieldset>
        
        <fieldset>
        <legend>Datos Alumno</legend>
            
            <div class="campo">
                <label for="no_control">Numero de control:</label>
                <input type="tel" id="no_control" name="no_control"> 
            </div>
            <div class="campo">
                <label for="semestre">Semestre:</label>
                <input type="text" id="id_semestre" name="id_semestre"> 
            </div>
            
        </fieldset>
    </div>
    <input type="submit" value="registro">
        
        
    </form>
    
</main>

@endsection