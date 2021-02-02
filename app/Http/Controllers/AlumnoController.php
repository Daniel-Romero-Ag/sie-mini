<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Calificacione;
use App\Models\Maestro;
use App\Models\Maestros_materias_alumno;
use App\Models\Materia;
use App\Models\Materias_alumno;
use App\Models\Materias_disponible;
use App\Models\User;
use Illuminate\Http\Request;
use Mockery\Undefined;

class AlumnoController extends Controller
{
    public function index(){
        $usuarios=User::get();
        return view('alumnos.create');
    }
    public function store(Request $request){
        $user= new User();
        $user->nombre=$request->nombre;
        $user->apellido_paterno=$request->apellido_paterno;
        $user->apellido_materno=$request->apellido_materno;
        $user->telefono=$request->telefono;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        $alumno = new Alumno();
        $alumno->no_control=$request->no_control;
        $alumno->id_user=$user->id;
        $alumno->id_semestre=$request->id_semestre;
        $alumno->save();
        return "Alumno agregado con exito";
    }
    public function loginView(Request $request){
        return view('alumnos.login',["login"=>true]);
    }
    public function login(Request $request){
        $materiasDisp=Materias_disponible::
        select("materias_disponibles.id as materia_disp_id","id_materia","id_maestro","clave_carrera","id_semestre","nombre","creditos")
        ->join('materias', 'materias.id', '=', 'materias_disponibles.id_materia')->get();


        $alumno=User::where("email",$request->email)
        ->where("password",$request->password)
        ->join('alumnos', 'alumnos.id_user', '=', 'users.id')->get();

        $alumnoCalif =User::where("email",$request->email)
        ->where("password",$request->password)
        ->join('alumnos', 'alumnos.id_user', '=', 'users.id')
        ->join('materias_alumnos', 'materias_alumnos.alumno_no_control', '=', 'alumnos.no_control')
        ->join('calificaciones', 'calificaciones.id_materias_alumnos', '=', 'materias_alumnos.id')
        // ->where('estudios_programados.id_paciente',$paciente->id)
        ->get();
        
        // return $alumnoCalif;
                foreach ($alumnoCalif as $value) {
                    
                    $maestro=Materias_disponible::where("materias_disponibles.id",$value->id_materia_disponible)
                    ->join('maestros', 'maestros.id', '=', 'materias_disponibles.id_maestro')
                    ->get();
                    $maestro=$maestro->all();
                    if(isset($maestro[0]["nombre"])){
                        $value["nombre_maestro"]=$maestro[0]["nombre"];
                    }
                    
                    
                    $materia=Materias_disponible::where("materias_disponibles.id",$value->id_materia_disponible)
                    ->join('materias', 'materias.id', '=', 'materias_disponibles.id_materia')
                    ->get();
                    $materia=$materia->all();
                    $value["materia"]=$materia[0]["nombre"];
                    $materias[]=$value;
                    
                }
    
                if(isset($materias)){
                    foreach ($materias as $materia) {
                        $materiasDisponibles[]=$materia->id_materia_disponible;
                    }
                    
                    foreach ($materiasDisp as $key=> $materiaGeneral) {
                        foreach ($materiasDisponibles as $value) {
                            if($materiaGeneral->materia_disp_id==$value){
                                $materiasDisp[$key]["estado"]="usado";
                            }
                        }
                    }
                   
                   foreach ($materiasDisp as $materiaEsp) {
                       if(isset($materiaEsp["estado"])){}
                       else{
                           $materiaSinUsar[]=$materiaEsp;
                       }
                   } 
                   $materiasDisp= $materiaSinUsar;
                    
                    
                    
                    return view('alumnos.calificaciones',compact("materias","materiasDisp"));
                }else{
                    $alumnoCalif = User::where("email",$request->email)
                    ->where("password",$request->password)->get();
                
                    $materias[0]["nombre"]=$alumnoCalif[0]["nombre"];
                    $materias[0]["apellido_paterno"]=$alumnoCalif[0]["apellido_paterno"];
                    $materias[0]["apellido_materno"]=$alumnoCalif[0]["apellido_materno"];
                    $materias[0]["id_user"]=$alumnoCalif[0]["id"];
                    
                    return view('alumnos.calificaciones',compact("materias","materiasDisp"));
                    
                }                
                // $alumnoMaestro= Maestro::where("id",$alumnoCalif)
                
    }
    public function agregarMaterias(Request $request){
    
        $materiasDisp=Materias_disponible::select("materias_disponibles.id as materia_disponible_id","id_materia","id_maestro","clave_carrera","id_semestre","nombre","creditos")
        ->join('materias', 'materias.id', '=', 'materias_disponibles.id_materia')->get();
        foreach ($materiasDisp as $key => $materiaGeneral) {
            foreach($request["id"] as $value){

                if($materiaGeneral->materia_disponible_id==$value){
                    $materiasDisp[$key]["estado"]="usado";
                }
            }
        }
        foreach ($materiasDisp as $key => $value) {
            if(isset($value["estado"])){
                $opciones[]=$materiasDisp[$key];
            }
        }
        $materiasDisp=$opciones;
        $request["materias"]=$materiasDisp;
        $datos=$request->all();
    

        return view("alumnos.cargarMaterias",["datos"=>$datos]);
    }
    public function cargarMaterias(Request $request){
         
        $cursos=[];
        $alumno= Alumno::where("id_user",$request->id_usuario)->get();
        
        

        foreach ($request->all() as  $key=>$value) {
            if($key=="_token"||$key=="id_usuario"){

            }else{
                $cursos[]=$key;  
            }

        }
        foreach ($cursos as $value) {
            $cargar= new Materias_alumno();
            $cargar->alumno_no_control=$alumno[0]["no_control"];
                
            $cargar->id_materia_disponible=$value;
            $cargar->save();    
            
            $calificacion= new Calificacione();
            $calificacion->id_materias_alumnos=$cargar->id;
            $calificacion->unidad_1=0;
            $calificacion->unidad_2=0;
            $calificacion->unidad_3=0;
            $calificacion->promedio=0;
            $calificacion->save();
    }
        return $cursos;
    }
}
