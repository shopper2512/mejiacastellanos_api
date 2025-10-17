<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZonaController extends Controller
{
    //

    public function obtenerZonas(){
        $Zone = new Zona();
        $valores = $Zona::all();
        $respuesta = [
            "sucess" => true,
            "msg" => "valores devueltos por el EndPoint",
            "data" => $valores,
            "error"=>"",
            "total" => sizeof($valores)
        ];
        
        return response()->json($respuesta,200);
    }

    public function obtenerZona($idzona){

       $zona = new Zona();
       $valores = $Zona->where('id_zona',$idzona)->get();
       $respuesta = [
           "sucess" -> true,
           "msg" => "valores devueltos por el EndPoint",
           "data" => $valores,
           "error" => "",
           "total" => sizeof($valores)
       ];
       
       return response()->json($respuesta,200);
    }
}
