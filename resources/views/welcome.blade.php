@extends('layouts.plantilla')
@section('content')
<header class="logo">
    <h1>Control Escolar</h1>
      <nav>
        <a href="#"><i class="fab fa-facebook-square"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </nav>
    </header>
  
      <main class="seccion">
        <h2>Bienvenido</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing etetur adipisicing etetur adipisicing etetur adipisicing etetur adipisicing etetur adipisicing elit. Tempora, amet. Dolores totam laudantium, dolorem, officia corporis maxime velit alias nulla doloribus error repudiandae exercitationem recusandae tenetur aspernatur aperiam inventore quos!</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora, amet. Dolores totam laudantium, dolorem, officia corporis maxime velit alias nulla doloribus error repudiandae exercitationem recusandae tenetur aspernatur aperiam inventore quos!</p>
      </main>
      
      <section class="seccion">
        <h2>Estudios</h2>
        <div class="estudios">
            @foreach ($carreras as $carrera)
            <a href="" class="estudio"> 
                <div >
                  <h3>{{$carrera->nombre}}</h3>
                  <img src="img/carrera{{$carrera->clave}}.jpeg" alt={{$carrera->nombre}}>
                </div>
              </a>
            @endforeach
           
      </section>
    <section class="seccion">
      <h2>Ubicación</h2>
      <div class="ubicacion" id="ubicacion"></div>
    </section>
@endsection