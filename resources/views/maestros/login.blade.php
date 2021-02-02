@extends('layouts.plantilla')
@section('content')
<style>form fieldset{
padding: 15px 10px 55px 10px;
}</style>
<main class="seccion">
    <h1>Inicia Sesion</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est autem cumque officia, perspiciatis assumenda earum ipsa repudiandae quasi ab quibusdam voluptates iste animi laudantium aut perferendis corporis, fugit debitis quo!</p>
    @if($login)         
             
@else
      <h3>Datos incorrectos</h3>      
@endif
    <form action="{{route('maestros.login')}}" method="post">
        @csrf
       
        
        <fieldset>
        <legend>Datos</legend>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
            
            
           
                <label for="password">Contraseña:</label>
                <input type="text" id="password" name="password">
            
            </fieldset>
        
        <input type="submit" value="Inicia Sesion" id="Registrarse">
        
    </form>
</main>

@endsection