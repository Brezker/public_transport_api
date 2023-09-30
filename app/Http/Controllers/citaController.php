<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_cita;

class citaController extends Controller
{
    public function list(){
        $citas = m_cita::join('enfermedad','cita.id_enfermedad','=','enfermedad.id')
        ->join('paciente','cita.id_paciente','=','paciente.id')
        ->join('doctor','cita.id_doctor','=','doctor.id')
        ->select('cita.*', 'enfermedad.nombre as nombre_enfermedad', 'paciente.nombre as nombre_paciente', 'doctor.nombre as nombre_doctor')
        ->get(); 
        return $citas;
    }
    public function save(Request $req){
        if ($req->id == 0) {
            $cita = new m_cita();
        } else {
            $cita = m_cita::find($req->id);
        }

        $cita->id_enfermedad = $req->id_enfermedad;
        $cita->id_paciente = $req->id_paciente;
        $cita->id_doctor = $req->id_doctor;
        $cita->consultorio = $req->consultorio;
        $cita->domicilio = $req->domicilio;
        $cita->fecha = $req->fecha;

        $cita->save();
    }

    public function lista(Request $req){
        $citas = m_cita::all();
        return $citas;
        //return "Ok"; //cuidado con como se pone en android
    }

    public function delete(Request $req){
        $cita = m_cita::find($req->id);
        $cita->delete();
        return "Ok"; //cuidado con como se pone en android
    }
}
