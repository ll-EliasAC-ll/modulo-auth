<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WpOrg\Requests\Requests;
//include('vendor/rmccue/requests/library/Requests.php');

class RegistroController extends Controller
{
    public function registro(Request $request){
        return view("registrar");
    }

    public function ver(){
        return view("bienvenido");
    }

    public function crear(){
        return view("newuser");
    }

    public function principal(){
        return view("home");
    }

    public function documento(Request $request)
    {
        $nombre = $request->input("nombre");
        $archivo = $request->input("archivo");

        // COMUNICANDO CON EL OTRO SERVICIO

        $datos = ["nombre" => $nombre, "archivo" => $archivo];
    
        $postData = json_encode($datos);
        
        $headers = ['Content-type' => 'application/json'];

        $URL = "http://localhost:5001/api/documentos";

        $response = Requests::post($URL, $headers, $postData);

        if ($response->status_code == 200) {

            $body = json_decode($response->body);

            if ($body->ok) {
                echo $body->mensaje;
            } else {
                //
                echo $body->mensaje;
             }
        }
    }
}
