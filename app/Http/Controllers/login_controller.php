<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login_controller extends Controller
{
    public function login(Request $request)
    {
        // Intenta autenticar al usuario utilizando las credenciales proporcionadas
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            // La autenticación fue exitosa, obtén el objeto del usuario autenticado
            $user = Auth::user();

            // Elimina todos los tokens de acceso existentes del usuario (revocación)
            $user->tokens()->delete();

            // Crea un nuevo token de acceso para la aplicación móvil y le da un nombre ("AppMobile")
            $token = $user->createToken("AppMobile");

            // Divide el token en un array utilizando el carácter "|" como separador y toma la segunda parte
            $token = explode("|", $token->plainTextToken);

            // Crea un array asociativo con el ID del usuario, el token , el nombre del usuario y el rol
            $arr = array('idUsr' => $user->id, 'token' => $token[1], 'nombre' => $user->name, 'rol' => $user->rol);

            // Devuelve la información del usuario en formato JSON como respuesta exitosa
            return json_encode($arr);
        } else {

            // La autenticación falló, crea un array con un mensaje de error
            $arr = array('idUsr' => 0, 'token' => "", 'nombre' => "", 'error' => "No existe el usuario o la contrasenia es invalida.");

            // Devuelve el mensaje de error en formato JSON como respuesta
            return json_encode($arr);
        }
    }
}
