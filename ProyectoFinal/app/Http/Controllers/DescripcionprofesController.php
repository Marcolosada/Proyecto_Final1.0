<?php

namespace App\Http\Controllers;

use App\Models\Descripcionprofes;
use Illuminate\Http\Request;

class DescripcionprofesController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Descripcionprofes  $descripcionprofes
     * @return \Illuminate\Http\Response
     */
    public function show(Descripcionprofes $descripcionprofes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Descripcionprofes  $descripcionprofes
     * @return \Illuminate\Http\Response
     */
    public function edit(Descripcionprofes $descripcionprofes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Descripcionprofes  $descripcionprofes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Descripcionprofes $descripcionprofes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Descripcionprofes  $descripcionprofes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Descripcionprofes $descripcionprofes)
    {
        //
    }

    public function searchmaestros(Request $request)
    {
        $texto = trim($request->get('texto'));
        $ens = Descripcionprofes::join('profesores', 'id_profesor', '=', 'profesores.id')
            ->where('nombree', 'like', '%' . $texto . '%')
            ->get();
        return view('layouts.laprofedex', Compact('ens'));
    }

    public function profedexsolo($id_profedex)
    {
        $ens = Descripcionprofes::join('profesores', 'id_profesor', '=', 'profesores.id')
            ->where('iddescrip', $id_profedex)
            ->first();
        return view('layouts.profedexsolo', Compact('ens'));
    }
}
