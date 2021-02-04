<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Requests\MaestrosRequest;
use App\Models\Maestro;
use App\Models\Materia;
use App\Models\User;
use Illuminate\Http\Request;

class MaestrosController extends Controller

{

    public function index(){
        $usuarios=User::get();
        return view('maestros.create');
    }
    public function store(MaestrosRequest $request){
        $user= new User();
        $user->nombre=$request->nombre;
        $user->apellido_paterno=$request->apellido_paterno;
        $user->apellido_materno=$request->apellido_materno;
        $user->telefono=$request->telefono;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        $maestro = new Maestro();
        
        $maestro->id_user=$user->id;
        $maestro->nombre=$request->nombre;
        $maestro->cedula=$request->cedula;
        $maestro->save();
        return view('maestros.maestroAgregado');
    }



    public function loginView(){
        return view('maestros.login',["login"=>true]);
    }
    public function login(Request $request){
        $maestroCalif = User::select("users.nombre","apellido_paterno","apellido_materno","users.email as correo","users.password as contrasenia","alumno_no_control","id_maestro","materias_disponibles.id","id_materia","id_materias_alumnos","unidad_1","unidad_2","unidad_3","promedio","calificaciones.id as calificaciones_id" )
                ->where("email",$request->email)
                ->where("password",$request->password)
                ->join('maestros', 'maestros.id_user', '=', 'users.id')
                ->join('materias_disponibles', 'materias_disponibles.id_maestro', '=', 'maestros.id')
                ->join('materias_alumnos', 'materias_alumnos.id_materia_disponible', '=', 'materias_disponibles.id')
                ->join('calificaciones', 'calificaciones.id_materias_alumnos', '=', 'materias_alumnos.id')
                // ->where('estudios_programados.id_paciente',$paciente->id)
                ->get();
            
                foreach ($maestroCalif as $value) {
                    $alumno=Alumno::where("no_control",$value->alumno_no_control)->get();
                    $alumno=$alumno->all();
                    $value["no_control_del_alumno"]=$alumno[0]["no_control"];
                    $materia=Materia::where("id",$value->id_materia)->get();
                    $materia=$materia->all();
                    $value["materia"]=$materia[0]["nombre"];
                    $materias[]=$value;
                    
                }
                
                if(isset($materias)){
                    return view('maestros.calificaciones',compact("materias"));
                }else{
                    $materias[0]["nombre"]="Daniel";
                    $materias[0]["apellido_paterno"]="Romero";
                    $materias[0]["apellido_materno"]="Aguilar";
                    $materias[0]["hay_otras"]="no";
                    return view('maestros.calificaciones',compact("materias"));
                }
                
                // $alumnoMaestro= Maestro::where("id",$maestroCalif)

    }
    public function login2(Request $request){
        $maestroCalif = User::select("users.nombre","apellido_paterno","apellido_materno","users.email as correo","users.password as contrasenia","alumno_no_control","id_maestro","materias_disponibles.id","id_materia","id_materias_alumnos","unidad_1","unidad_2","unidad_3","promedio","calificaciones.id as calificaciones_id" )
                ->where("email",$request->correo)
                ->where("password",$request->contrasenia)
                ->join('maestros', 'maestros.id_user', '=', 'users.id')
                ->join('materias_disponibles', 'materias_disponibles.id_maestro', '=', 'maestros.id')
                ->join('materias_alumnos', 'materias_alumnos.id_materia_disponible', '=', 'materias_disponibles.id')
                ->join('calificaciones', 'calificaciones.id_materias_alumnos', '=', 'materias_alumnos.id')
                // ->where('estudios_programados.id_paciente',$paciente->id)
                ->get();
            
                foreach ($maestroCalif as $value) {
                    $alumno=Alumno::where("no_control",$value->alumno_no_control)->get();
                    $alumno=$alumno->all();
                    $value["no_control_del_alumno"]=$alumno[0]["no_control"];
                    $materia=Materia::where("id",$value->id_materia)->get();
                    $materia=$materia->all();
                    $value["materia"]=$materia[0]["nombre"];
                    $materias[]=$value;
                    
                }
                
                if(isset($materias)){
                    return view('maestros.calificaciones',compact("materias"));
                }else{
                    $materias[0]["nombre"]="Daniel";
                    $materias[0]["apellido_paterno"]="Romero";
                    $materias[0]["apellido_materno"]="Aguilar";
                    $materias[0]["hay_otras"]="no";
                    return view('maestros.calificaciones',compact("materias"));
                }
       
    }
}
