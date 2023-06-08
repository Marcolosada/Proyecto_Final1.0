<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesores;
use App\Models\Semestres;
use App\Models\Materias;

class EscuelaController extends Controller
{
    public function traemaestros()
    {
        $ens = Profesores::all();
        $sem = Semestres::all();
        return view('layouts.escribeconsejo', ['profes' => $ens, 'semestre' => $sem]);
    }

    public function materias($id)
    {
        $meta = Materias::all()->where('id_semestre', $id);
        echo json_encode($meta);
    }
}
