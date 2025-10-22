<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zona;

class ZonaController extends Controller
{
    //

    public function obtenerZonas(){

        $Zona = new Zona();

        $satisfactorio = false;
        $estado = 0;
        $mensaje = "";
        $errores = [];
        $valores = [];

        //VERIFICANDO LA EXISTENCIA DE DATOS
        $valores = $Zona::all();

        //SE ENCONTRARON DATOS
        if(!empty($valores)){
            $satisfactorio = true;
            $estado = 200;
            $mensaje = "Valores encontrados";
            $errores = [
                "code" => 200,
                "msg" => ""
            ];
        }else{
            //NO SE ENCONTRARON DATOS
            $satisfactorio = false;
            $estado = 404;
            $mensaje = "No se han encontrado valores";
            $errores = [
                "code" => 404,
                "msg" => "Datos no encontrados"
            ];
        }

        //SE CREA LA VARIABLE DE SALIDA
        $respuesta = [
            "success" => $satisfactorio,
            "status" => $estado,
            "msg" => $mensaje,
            "data" => $valores,
            "errors" => $errores,
            "total" => sizeof($valores)
        ];

        //SE RETORNA EL MENSAJE AL USUARIO
        return response()->json($respuesta,$estado);

        $valores = $Zona::all();
        $respuesta = [
            "sucess" => true,
            "msg" => "Valores devueltos por el EndPoint",
            "data" => $valores,
            "error" => "",
            "total" => sizeof($valores) 
        ];

        return response()->json($respuesta,200);

    }

    public function obtenerZona(int $idzona = 0){

        $satisfactorio = false;
        $estado = 0;
        $mensaje = "";
        $errores = [];
        $valores = [];

        if($idzona > 0){
            $Zona = new Zona();
            $valores = $Zona->where('id_zona',$idzona)->get();
            
            //SE VERIFICA LA EXISTENCIA DE DATOS
            if(!empty($valores)){
                //SI SE ENCONTRARON DATOS
                $satisfactorio = true;
                $estado = 200;
                $mensaje = "Valores encontrados";
                $errores = [
                    "code" => 200,
                    "msg" => ""
                ];
            }else{
            //NO SE ENCONTRARON DATOS
                $satisfactorio = false;
                $estado = 404;
                $mensaje = "No se han encontrado valores";
                $errores = [
                    "code" => 404,
                    "msg" => "Datos no encontrados"
                ];
            }//FIN DEL if(!empty($valores))
        
        }else{
            //NO SE HA ENVIADO UN VALOR PARA EL PARAMETRO $idzona
            $satisfactorio = false;
            $estado = 404;
            $mensaje = "No se ha enviado el parametro obligatorio";
            $errores = [
                "code" => 404,
                "msg" => "el identificador de la zona esta vacio"
            ];
        }//FIN DEL if($idzona > 0)

        //SE CREA LA VARIABLE DE SALIDA
        $respuesta = [
                "sucess" => $satisfactorio,
                "status" => $estado,
                "msg" => $mensaje,
                "data" => $valores,
                "errors" => $errores,
                "total" => sizeof($valores) 
        ];

        return response()->json($respuesta,$estado);

    }
}