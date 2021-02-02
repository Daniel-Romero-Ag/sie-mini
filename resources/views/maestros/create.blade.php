@extends('layouts.plantilla')
@section('content')
<main class="seccion">
    <h1>Registro</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est autem cumque officia, perspiciatis assumenda earum ipsa repudiandae quasi ab quibusdam voluptates iste animi laudantium aut perferendis corporis, fugit debitis quo!</p>
    <form action="{{route('maestros.store')}}" class="registrUsuario" method="post" id="formulario-registro">
        @csrf
        <div class="campos">
        <fieldset>
        <legend>Datos Personales</legend>
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
            </div>
            
            <div class="campo">
                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" id="apellido_paterno" name="apellido_paterno">
            </div>
            
            <div class="campo">
                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" id="apellido_materno" name="apellido_materno">
            </div>
            
            <div class="campo">
                <label for="telefono">Telefono:</label>
                <input type="tel" id="telefono" name="telefono">
            </div>
           
            <div class="campo">
                <label for="email">Email:</label>
                <input type="mail" id="email" name="email">   
            </div>
            
            <div class="campo">
                <label for="password">Contraseña:</label>
                <input type="tel" id="password" name="password">
            </div>
        </fieldset>
        
        <fieldset>
        <legend>Datos Alumno</legend>
            
            <div class="campo">
                <label for="cedula">Cedula:</label>
                <input type="tel" id="cedula" name="cedula"> 
            </div>
            
            
        </fieldset>
    </div>
    <input type="submit" value="registro">
        
        
    </form>
    
</main>

@endsection