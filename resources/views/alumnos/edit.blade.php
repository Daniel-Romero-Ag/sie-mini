@extends('layouts.plantilla')
@section('content')

<main class="seccion">
    <h1>Agendar Cita</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, aliquam. Est quis illo soluta repudiandae sed, tempora esse aliquam sint asperiores ipsum eius in doloribus, et sunt, dicta ea commodi.</p>
    <form  action="{{route('agendarCita')}}"  method="post">
        
           
            @csrf
            <fieldset>
                <legend>Fecha y Doctor</legend>
                <div class="campo">
                        <label for="fecha">Fecha:</label>
                        <input required type="date" id="fecha" name="fecha">
                    </div>
                    <div class="campo">
                        <label for="hora">Hora:</label>
                        <input required type="time" id="hora" name="hora">
                    </div>
                    
                    <div class="campo">
                        <label for="doctor">Doctor:</label>
                        <select name="id_doctores" id="id_doctor"  >
                          @foreach ($doctores as $doctor)
                          <option value="{{$doctor["id"]}}">{{$doctor["nombre"]}} {{$doctor["apellido"]}}</option>
                          @endforeach
                            
                            
                        </select>
                        
                    </div>
            </fieldset>
            <input type="hidden" name="id_pacientes"  id="id_paciente" value="{{$id_paciente}}">
            
        <input type="submit" value="Agendar">
    </form>
                                
    
</main>



@endsection