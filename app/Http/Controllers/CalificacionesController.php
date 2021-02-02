<?php

namespace App\Http\Controllers;

use App\Models\Calificacione;
use Illuminate\Http\Request;

class CalificacionesController extends Controller
{
    public function show(Request $request){
        
        $calificacion= Calificacione::where("id",$request->calificaciones_id)->get();
        $calificacion=$calificacion[0];
        $request->unidad_1=$calificacion->unidad_1;
        $request->unidad_2=$calificacion->unidad_2;
        $request->unidad_3=$calificacion->unidad_3;
        $request->promedio=$calificacion->promedio;
        
        return view('calificaciones.show',compact("request"));
    }
    public function volver(Request $request){
        
        return redirect()->route('maestros.login2',$request->correo,$request->contrasenia);
    }
    public function edit(Request $request){
       
        $calificacion= Calificacione::where("id",$request->calificaciones_id)->get();
        $calificacion=$calificacion[0];
        $calificacion->unidad_1=$request->unidad_1;
        $calificacion->unidad_2=$request->unidad_2;
        $calificacion->unidad_3=$request->unidad_3;
        $calificacion->promedio= ($calificacion->unidad_1+$calificacion->unidad_2+$calificacion->unidad_3)/3 ;
        $calificacion->save();
        return redirect()->back(); 
        }
}
