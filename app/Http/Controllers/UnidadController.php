<?php

namespace App\Http\Controllers;

use App\Models\m_unidad;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

//Declaracion de la clase "UnidadController", que extiende de la clase "Controller" de Laravel
class UnidadController extends Controller
{
    //Metodo "save" para guardar o acutualizar una ruta en la base de datos
    public function save(Request $req)
    {

        //Verificar si el valor del "id" en la solicitud es igual a 0
        if ($req->id == 0) {
            //Si e 0, entonces se crea una nueva instancia de m_ruta
            $unidad =  new m_unidad();
        } else {
            //Si no es 0, entonces busca una parada existente por su id
            $unidad =  m_unidad::find($req->id);
        }

        $unidad->id_para = $req->id_para;
        $unidad->id_ruta = $req->id_ruta;
        $unidad->num = $req->num;
        $unidad->check = $req->check;
        $unidad->act_inact = $req->act_inact;
        $unidad->h_salida = $req->h_salida;
        $unidad->h_llegada = $req->h_llegada;
        $unidad->pasa_por = $req->pasa_por;
        $unidad->nota = $req->nota;

        $unidad->save();
    }

    //Metodo "list" para obtener una lista de todas las unidades que hay en la base de datos
    public function list(Request $req)
    {
        //Obtener todas las unidades desde el modelo "m_unidad"
        $unidades = m_unidad::all();

        //Retorna la lista de unidades como  respuesta
        return $unidades;
    }

    //Metodo "delete" para eliminar una unidad por su "id"
    public function delete(Request $req)
    {
        //Busca la unidad por su  "id"
        $unidad = m_unidad::find($req->id);

        //Elimina la ruta de la base de datos
        $unidad->delete();

        return "Ok";
    }


    //Funciones para listar las unidades en true o false ('check')
    public function listFalse(Request $req)
    {
        // Obtener todas las unidades donde 'check' es igual a false desde el modelo "m_unidad"
        $unidades = m_unidad::where('check', false)->get();

        // Retornar la lista de unidades con 'check' igual a false como respuesta
        return $unidades;
    }


    public function listTrue(Request $req)
    {
        // Obtener todas las unidades donde 'check' es igual a true desde el modelo "m_unidad"
        $unidades = m_unidad::where('check', true)->get();

        // Retornar la lista de unidades con 'check' igual a true como respuesta
        return $unidades;
    }
}
