<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materias;
use App\Models\Profesores;
use App\Models\Semestres;
use App\Models\Consejos;

class ConsejosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:500|regex:/^[\pL\s\-]+$/u',
            'descripcion' => 'required|max:9000',
        ]);

        $nuevo = new Consejos;
        $nuevo->id_user = Auth()->user()->id;
        $nuevo->id_materia = $request->materias;
        $nuevo->id_semestre = $request->semestres;
        $nuevo->id_profesor = $request->profesor;
        $nuevo->titulo = $request->titulo;
        $nuevo->descripcion = $request->descripcion;
        $nuevo->save();
        return redirect('/escribeunconsejo')->with('message', 'Datos insertados con exito, esperar respuesta del moderador');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function manualdeconsejosvista()
    {

        $activo = 1;
        $consejos = Consejos::join('profesores', 'id_profesor', '=', 'profesores.id')
            ->join('semestres', 'id_semestre', '=', 'semestres.id')
            ->join('materias', 'id_materia', '=', 'materias.id')
            ->where('activo', $activo)
            ->paginate(3);
        return view('layouts.manualdeconsejosvista', ['consejos' => $consejos]);
    }
    public function searchconsejosvista(Request $request)
    {
        $texto = trim($request->get('texto'));
        $activo = 1;
        $consejos = Consejos::join('profesores', 'id_profesor', '=', 'profesores.id')
            ->join('semestres', 'id_semestre', '=', 'semestres.id')
            ->join('materias', 'id_materia', '=', 'materias.id')
            ->where('activo', $activo)
            ->where('titulo', 'like', '%' . $texto . '%')
            ->paginate(3);;
        return view('layouts.manualdeconsejosvista', ['consejos' => $consejos]);
    }

    public function mostrarsolounconsejo($id_consejo)
    {
        $consejos = Consejos::join('profesores', 'id_profesor', '=', 'profesores.id')
            ->join('semestres', 'id_semestre', '=', 'semestres.id')
            ->join('materias', 'id_materia', '=', 'materias.id')
            ->where('idconsejo', $id_consejo)
            ->first();


        return view('layouts.mostrarsolouno', compact('consejos'));
    }
}
