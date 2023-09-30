<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_doctor;

class doctorController extends Controller
{
    public function save(Request $req){
        if ($req->id == 0) {
            $doctor = new m_doctor();
        } else {
            $doctor = m_doctor::find($req->id);
        }

        $doctor->nombre = $req->nombre;
        $doctor->cedula = $req->cedula;
        $doctor->especialidad = $req->especialidad;
        $doctor->turno = $req->turno;
        $doctor->telefono = $req->telefono;
        $doctor->email = $req->email;

        $doctor->save();
    }

    public function list(Request $req){
        $doctores = m_doctor::all();
        return $doctores;
        //return "Ok"; //cuidado con como se pone en android
    }

    public function delete(Request $req){
        $doctor = m_doctor::find($req->id);
        $doctor->delete();
        return "Ok"; //cuidado con como se pone en android
    }
}
