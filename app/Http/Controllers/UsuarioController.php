<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function validar(Request $request){
        $correo = $request->json("correo");
        $password = $request->json("password");
        $user = DB::table("usuarios")->where("correo",$correo)->first();

        if ($user)
        {
            if ($user->password == $password) {
                return response()->json(["login" => true, "mensaje" => "logeado correctamente"]);
            }
            return response()->json(["login" => false]);
        }
        return response()->json(["login" => false, "mensaje" => "usuario no existe en la base de datos"]);
    }

    public function registrar(Request $request)
    {
        $correo = $request->json("correo");
        $password = $request->json("password");

        $user = DB::table("usuarios")->where("correo", $correo)->first();

        if ($user) {
            return response()->json(["registrar" => false, "mensaje" => "el usuairo ya está registrdo"]);
        }

        $usuario = new Usuario();
        $usuario->correo = $correo;
        $usuario->password = $password;
        if ($usuario->save()) {
            return response()->json(["registrar" => true, "mensaje" => "usuario registrado correctamente"]);
        }

        return response()->json(["registrar" => false, "mensaje" => "falló el registro"]);
    }
}
