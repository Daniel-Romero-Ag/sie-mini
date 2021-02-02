@extends('layouts.plantilla')
@section('content')
<main class="seccion">
<h2>Materias Disponibles</h2>



    
    
    <form action="{{route('materias.cargar')}}" >
        @csrf
        <div class="citas-perfil">
        @foreach ($datos["materias"] as $dato)
        <div class="cita-perfil">
        <label for="{{$dato->id}}">Materia: {{$dato->nombre}}</label>
        <input type="checkbox" name="{{$dato->materia_disponible_id}}" id="Creditos: {{$dato->id}}  ">
    </div>
        @endforeach
        <input type="hidden" name="id_usuario" value={{$datos["id_user"]}}>
        <input type="submit" value="Agregar Materias">
    </div>
    </form>
             
        
    
        
    

</div>
</main>

@endsection