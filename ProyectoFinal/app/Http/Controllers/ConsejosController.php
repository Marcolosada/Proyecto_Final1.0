<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materias;
use App\Models\Profesores;
use App\Models\Semestres;
use App\Models\Consejos;
use App\Models\User;
use App\Models\Descripcionprofes;

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
        $userb = User::with('roles')->where('id', Auth()->user()->id)->first();
        $role = $userb->roles->first()->name;

        if ($role == 'Admin') {
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
            $nuevo->activo = 1;
            $nuevo->save();
            return redirect('/escribeunconsejo')->with('message', 'Datos insertados con exito, consejo nuevo creado');
        } else {
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
    public function update(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:500|regex:/^[\pL\s\-]+$/u',
            'descripcion' => 'required|max:9000',
        ]);

        $materia = $request->materias;
        $semestre =  $request->semestres;
        $profesor = $request->profesor;
        $titulo = $request->titulo;
        $descripcion = $request->descripcion;

        $userb = User::with('roles')->where('id', Auth()->user()->id)->first();
        $role = $userb->roles->first()->name;

        if ($role == 'Admin') {
            Consejos::where('idconsejo',  $request->idconsejo)
                ->update([
                    'activo' => 1,
                    'id_materia' => $materia,
                    'id_semestre' => $semestre,
                    'id_profesor' => $profesor,
                    'titulo' => $titulo,
                    'descripcion' => $descripcion
                ]);
            return redirect('/consejosgenral')->with('message', 'Datos del consejo numero ' . $request->idconsejo . ' actulizado con exito');
        } else {
            Consejos::where('idconsejo',  $request->idconsejo)
                ->update([
                    'activo' => 2,
                    'id_materia' => $materia,
                    'id_semestre' => $semestre,
                    'id_profesor' => $profesor,
                    'titulo' => $titulo,
                    'descripcion' => $descripcion
                ]);
            return redirect('/misconsejos')->with('message', 'Datos del consejo numero' . $request->idconsejo . ' actulizado, espere respuesta del moderador');
        }
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
            ->paginate(3);
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

    public function solicitudes()
    {
        $activo = 2;
        $consejos = Consejos::join('profesores', 'id_profesor', '=', 'profesores.id')
            ->join('semestres', 'id_semestre', '=', 'semestres.id')
            ->join('materias', 'id_materia', '=', 'materias.id')
            ->join('users', 'id_user', '=', 'users.id')
            ->where('activo', $activo)
            //->where('id_user', Auth()->user()->id)
            ->paginate(6);
        return view('layouts.solicitudes', compact('consejos'));
    }

    public function validasolicitud(Request $request, $id_consejo)
    {
        Consejos::where('idconsejo', $id_consejo)->update(['activo' => 1]);
        return redirect('/solicitudes')->with('message', 'Solicitud numero ' . $id_consejo . ' activada con exito');
    }
    public function cancelarsolicitud(Request $request, $id_consejo)
    {
        Consejos::where('idconsejo', $id_consejo)->update(['activo' => 0]);
        return redirect('/solicitudes')->with('message2', 'Solicitud numero ' . $id_consejo . ' cancelada con exito');
    }
    public function misconsejos()
    {
        $consejos = Consejos::join('profesores', 'id_profesor', '=', 'profesores.id')
            ->join('semestres', 'id_semestre', '=', 'semestres.id')
            ->join('materias', 'id_materia', '=', 'materias.id')
            ->where('id_user', Auth()->user()->id)
            ->paginate(6);
        return view('layouts.consejosuser', compact('consejos'));
    }
    public function activarconsejouser($id_consejo)
    {
        $userb = User::with('roles')->where('id', Auth()->user()->id)->first();
        $role = $userb->roles->first()->name;

        if ($role == 'Admin') {
            Consejos::where('idconsejo', $id_consejo)->update(['activo' => 1]);
            return redirect('/consejosgenral')->with('message', 'Consejo numero ' . $id_consejo . ' activada con exito');
        } else {
            Consejos::where('idconsejo', $id_consejo)->update(['activo' => 2]);
            return redirect('/misconsejos')->with('message', 'Solicitud numero ' . $id_consejo . ' enviada para su revision');
        }
    }
    public function eliminarconsejouser($id_consejo)
    {
        Consejos::where('idconsejo', $id_consejo)->update(['activo' => 3]);
        return redirect('/misconsejos')->with('message2', 'Consejo numero ' . $id_consejo . ' eliminado con exito');
    }
    public function actulizarconsejo($id_consejo)
    {
        $consejos = Consejos::join('profesores', 'id_profesor', '=', 'profesores.id')
            ->join('semestres', 'id_semestre', '=', 'semestres.id')
            ->join('materias', 'id_materia', '=', 'materias.id')
            ->where('idconsejo', $id_consejo)
            ->first();

        $meta = Materias::all()->where('id_semestre', $consejos->id_semestre);
        $ens = Profesores::all();
        $sem = Semestres::all();

        return view('layouts.updateescribeconsejo', ['consejos' => $consejos, 'profes' => $ens, 'semestre' => $sem, 'meta' => $meta]);
    }

    public function generalconsejos()
    {
        $consejos = Consejos::join('profesores', 'id_profesor', '=', 'profesores.id')
            ->join('semestres', 'id_semestre', '=', 'semestres.id')
            ->join('materias', 'id_materia', '=', 'materias.id')
            ->join('users', 'id_user', '=', 'users.id')
            ->paginate(5);
        return view('layouts.consejosgeneral', compact('consejos'));
    }

    public function laprofedex()
    {
        $ens = Descripcionprofes::join('profesores', 'id_profesor', '=', 'profesores.id')->get();
        return view('layouts.laprofedex', Compact('ens'));
    }
}
