<?php

namespace App\Http\Controllers;

use App\Models\m_ruta;
use Illuminate\Http\Request;


//Declaracion de la clase "RutaController", que extiende de la clase "Controller" de Laravel
class RutaController extends Controller
{
    //Metodo "save" para guardar o acutualizar una ruta en la base de datos
    public function save(Request $req)
    {

        //Verificar si el valor del "id" en la solicitud es igual a 0
        if ($req->id == 0) {

            //Si e 0, entonces se crea una nueva instancia de m_ruta
            $ruta = new m_ruta();
        } else {

            //Si no es 0, entonces busca una parada existente por su id
            $ruta = m_ruta::find($req->id);
        }

        //asignar valores a las propiedades del objeto "ruta" basados en la solicitud
        $ruta->nom_ruta = $req->nom_ruta;

        //Guarda la parada en la base de datos
        $ruta->save();
    }


    //Metodo "list" para obtener una lista de todas las rutas que hay en la base de datos
    public function list(Request $req)
    {
        //Obtener todas las rutas desde el modelo "m_ruta"
        $rutas = m_ruta::all();

        //Retorna la lista de rutas como  respuesta
        return $rutas;
    }


    //Metodo "delete" para eliminar una ruta por su "id"
    public function delete(Request $req)
    {

        //Busca la ruta por su "id"
        $ruta = m_ruta::find($req->id);

        //Elimina la ruta de la base de datos
        $ruta->delete();

        return "Ok";
    }
}
