<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesores;
use App\Models\Semestres;
use App\Models\Materias;
use App\Models\Etiquetas;

class EscuelaController extends Controller
{
    public function traemaestros()
    {
        $ens = Profesores::all();
        $sem = Semestres::all();
        $etiqueta = Etiquetas::all();
        return view('layouts.escribeconsejo', ['profes' => $ens, 'semestre' => $sem, 'etiquet' => $etiqueta]);
    }

    public function materias($id)
    {
        $meta = Materias::all()->where('id_semestre', $id);
        echo json_encode($meta);
    }
}
