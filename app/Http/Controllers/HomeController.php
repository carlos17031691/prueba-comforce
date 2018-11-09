<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sede;
use App\Proceso;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function procesos()
    {
        $procesos=DB::table('procesos')
                ->join('users','users.id','=','procesos.user_id')
                ->join('sedes','sedes.id','=','procesos.sede_id')
                ->select('procesos.id as id','procesos.numero as numero','procesos.descripcion as descripcion','procesos.fecha as fecha','sedes.descripcion as sede','procesos.presupuesto as presupuesto','users.name as usuario')
                ->get();
        //dd($procesos);
        return view('procesos', compact('procesos'));
    }

    public function crear_proceso()
    {
        $sedes=Sede::all();
        return view('crear_proceso',compact('sedes'));
    }

    public function registrar_proceso(Request $request)
    {
        $proceso=New Proceso;
        $proceso->numero=$request->numero;
        $proceso->presupuesto=$request->presupuesto;
        $proceso->sede_id=$request->sede;
        $proceso->descripcion=$request->descripcion;
        $proceso->user_id=Auth::user()->id;
        $proceso->save();
        return redirect()->route('procesos')->withFlashSuccess('Proceso registrado con exito');
    }

    public function detalle_proceso($numero)
    {
        $proceso=Proceso::where('numero','=',$numero)->first();
        $sedes=Sede::all();
        //dd($proceso);
        return view('detalle_proceso',compact('sedes','proceso'));

    }
    public function editar_proceso($numero)
    {
        $proceso=Proceso::where('numero','=',$numero)->first();
        $sedes=Sede::all();
        //dd($proceso);
        return view('editar_proceso',compact('sedes','proceso'));

    }

    public function actualizar_proceso(Request $request)
    {
        $proceso=Proceso::where('numero','=',$request->numero)->first();
        $proceso->presupuesto=$request->presupuesto;
        $proceso->sede_id=$request->sede;
        $proceso->descripcion=$request->descripcion;
        $proceso->user_id=Auth::user()->id;
        $proceso->update();
        return redirect()->route('procesos')->withFlashSuccess('Proceso actualizado con exito');
    }
}
