<?php

namespace App\Http\Controllers;

use App\Models\m_parada;
use Illuminate\Http\Request;

class ParadaController extends Controller
{
    public function save(Request $req)
    {
        if ($req->id == 0) {
            $parada = new m_parada();
        } else {
            $parada = m_parada::find($req->id);
        }
        //$parada->id_usr = $req->id_usr;
        $parada->nom_par = $req->nom_par;
        $parada->save();
    }

    public function list(Request $req)
    {
        $paradas = m_parada::all();
        return $paradas;
        return "Ok"; //cuidado con como se pone en android
    }

    public function delete(Request $req)
    {
        $parada = m_parada::find($req->id);
        $parada->delete();
        return "Ok"; //cuidado con como se pone en android
    }
}
