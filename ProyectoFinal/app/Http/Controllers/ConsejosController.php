<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materias;
use App\Models\Profesores;
use App\Models\Semestres;
use App\Models\Consejos;
use App\Models\User;
use App\Models\Descripcionprofes;
use App\Models\Etiquetas;
use App\Models\Detalle_etiquetas;

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
            $etiquetas =  $request->etiqueta;
            $oculto = [];
            foreach ($etiquetas as $etic) {
                $etieutaname = Etiquetas::where('idetiqueta', $etic)->first();
                $oculto[] = $etieutaname['genero'];
            }

            $nuevo = new Consejos;
            $nuevo->id_user = Auth()->user()->id;
            $nuevo->id_materia = $request->materias;
            $nuevo->id_semestre = $request->semestres;
            $nuevo->id_profesor = $request->profesor;
            $nuevo->titulo = $request->titulo;
            $nuevo->descripcion = $request->descripcion;
            $nuevo->activo = 1;
            $nuevo->etiquet = implode(",", $oculto);
            $nuevo->save();
            $nuevoidcobsejo = $nuevo->id;
            foreach ($etiquetas as $etic) {
                $new = new Detalle_etiquetas;
                $new->id_consejo = $nuevoidcobsejo;
                $new->id_etiqueta  = $etic;
                $new->save();
            }

            return redirect('/escribeunconsejo')->with('message', 'Datos insertados con exito, consejo nuevo creado');
        } else {
            $this->validate($request, [
                'titulo' => 'required|max:500|regex:/^[\pL\s\-]+$/u',
                'descripcion' => 'required|max:9000',
            ]);

            $etiquetas =  $request->etiqueta;
            $oculto = [];
            foreach ($etiquetas as $etic) {
                $etieutaname = Etiquetas::where('idetiqueta', $etic)->first();
                $oculto[] = $etieutaname['genero'];
            }

            $nuevo = new Consejos;
            $nuevo->id_user = Auth()->user()->id;
            $nuevo->id_materia = $request->materias;
            $nuevo->id_semestre = $request->semestres;
            $nuevo->id_profesor = $request->profesor;
            $nuevo->titulo = $request->titulo;
            $nuevo->descripcion = $request->descripcion;
            $nuevo->etiquet = implode(",", $oculto);
            $nuevo->save();
            $nuevoidcobsejo = $nuevo->id;
            foreach ($etiquetas as $etic) {
                $new = new Detalle_etiquetas;
                $new->id_consejo = $nuevoidcobsejo;
                $new->id_etiqueta  = $etic;
                $new->save();
            }

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

        $etiquetas =  $request->etiqueta;
        $oculto = [];
        foreach ($etiquetas as $etic) {
            $etieutaname = Etiquetas::where('idetiqueta', $etic)->first();
            $oculto[] = $etieutaname['genero'];
        }

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
                    'descripcion' => $descripcion,
                    'etiquet' => implode(",", $oculto)
                ]);
            $nuevoidcobsejo = $request->idconsejo;
            $eliminar = Detalle_etiquetas::where('id_consejo', $nuevoidcobsejo);
            $eliminar->delete();
            foreach ($etiquetas as $etic) {
                $new = new Detalle_etiquetas;
                $new->id_consejo = $nuevoidcobsejo;
                $new->id_etiqueta  = $etic;
                $new->save();
            }
            return redirect('/consejosgenral')->with('message', 'Datos del consejo numero ' . $request->idconsejo . ' actulizado con exito');
        } else {
            Consejos::where('idconsejo',  $request->idconsejo)
                ->update([
                    'activo' => 2,
                    'id_materia' => $materia,
                    'id_semestre' => $semestre,
                    'id_profesor' => $profesor,
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'etiquet' => implode(",", $oculto)
                ]);
            $nuevoidcobsejo = $request->idconsejo;
            $eliminar = Detalle_etiquetas::where('id_consejo', $nuevoidcobsejo);
            $eliminar->delete();
            $etiquetas =  $request->etiqueta;
            foreach ($etiquetas as $etic) {
                $new = new Detalle_etiquetas;
                $new->id_consejo = $nuevoidcobsejo;
                $new->id_etiqueta  = $etic;
                $new->save();
            }
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

        $etiquetas = Consejos::join('detalle_etiquetas', 'idconsejo', '=', 'detalle_etiquetas.id_consejo')
            ->join('etiquetas', 'detalle_etiquetas.id_etiqueta', '=', 'etiquetas.idetiqueta')
            ->where('activo', $activo)
            ->get();

        return view('layouts.manualdeconsejosvista', ['consejos' => $consejos, 'etiquetas' => $etiquetas]);
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

        $etiquetas = Consejos::join('detalle_etiquetas', 'idconsejo', '=', 'detalle_etiquetas.id_consejo')
            ->join('etiquetas', 'detalle_etiquetas.id_etiqueta', '=', 'etiquetas.idetiqueta')
            ->where('activo', $activo)
            ->get();
        return view('layouts.manualdeconsejosvista', ['consejos' => $consejos, 'etiquetas' => $etiquetas]);
    }
    public function searchconsejosvista2(Request $request)
    {
        $texto = trim($request->get('texto'));
        $activo = 1;
        $consejos = Consejos::join('profesores', 'id_profesor', '=', 'profesores.id')
            ->join('semestres', 'id_semestre', '=', 'semestres.id')
            ->join('materias', 'id_materia', '=', 'materias.id')
            ->where('activo', $activo)
            ->where('etiquet', 'like', '%' . $texto . '%')
            ->paginate(3);

        $etiquetas = Consejos::join('detalle_etiquetas', 'idconsejo', '=', 'detalle_etiquetas.id_consejo')
            ->join('etiquetas', 'detalle_etiquetas.id_etiqueta', '=', 'etiquetas.idetiqueta')
            ->where('activo', $activo)
            ->get();

        return view('layouts.manualdeconsejosvista', ['consejos' => $consejos, 'etiquetas' => $etiquetas]);
    }

    public function mostrarsolounconsejo($id_consejo)
    {
        $consejos = Consejos::join('profesores', 'id_profesor', '=', 'profesores.id')
            ->join('semestres', 'id_semestre', '=', 'semestres.id')
            ->join('materias', 'id_materia', '=', 'materias.id')
            ->where('idconsejo', $id_consejo)
            ->first();
        $etiquetas = Detalle_etiquetas::join('etiquetas', 'id_etiqueta', '=', 'etiquetas.idetiqueta')->where('id_consejo', $id_consejo)->get();
        return view('layouts.mostrarsolouno', compact('consejos', 'etiquetas'));
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
            ->paginate(5);
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

        $etiquetas2 = Detalle_etiquetas::where('id_consejo', $id_consejo)->get();
        $etiquetas = array();
        foreach ($etiquetas2 as $permisoAsignado) {
            $etiquetas[$permisoAsignado['id_etiqueta']] = true;
        }

        $meta = Materias::all()->where('id_semestre', $consejos->id_semestre);
        $ens = Profesores::all();
        $sem = Semestres::all();
        $etiqueta = Etiquetas::all();

        return view('layouts.updateescribeconsejo', ['consejos' => $consejos, 'profes' => $ens, 'semestre' => $sem, 'meta' => $meta, 'etiquet' => $etiqueta, 'etikguar' => $etiquetas]);
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
