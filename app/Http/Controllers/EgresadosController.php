<?php

namespace App\Http\Controllers;

use App\Carreras;
use App\Ciudades;
use App\Egresados;
use App\Estados;
use App\Http\Requests\storeEgresados;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EgresadosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $carerras = Carreras::orderBy('nombre')->pluck('nombre','id');
        $title = "Egresados";
        $x = 1;
        if($request->has('carrera') || $request->has('promedio')){
            if($request->has('carrera')){
                $title = "Egresados por carrera";
                $egresados = Egresados::where('carrera_id', $request->get('carrera'))->paginate(2);
            }
            if($request->has('promedio')){
                $title = "Egresados por promedio ";
                if($request->get('promedio') == 0){
                    $egresados = Egresados::orderBy('promedio','desc')->paginate(2);
                }else{
                    $egresados = Egresados::orderBy('promedio','asc')->paginate(2);
                }
            }
        }else{
            $egresados = Egresados::orderBy('nombre')->paginate(2);
        }

        
        return view('egresados.index',compact('egresados','title','x','carerras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carerras = Carreras::orderBy('nombre')->pluck('nombre','id');
        $state = Estados::orderBy('nombre')->pluck('nombre', 'id');

        return view('egresados.create', compact('carerras','state'));
    }
    public function getTowns(Request $request, $id){
        if($request->ajax()){
            $citys = Ciudades::towns($id);
            return response()->json($citys);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 'carreara_id',
    'ciudad_id',
    'no_control',
    'nombre',
    'sexo',
    'estado_civil',
    'nacimiento',
    'curp',
    'telefono',
    'celular',
    'email',
    'fecha_egreso',
    'promedio',
    'imagen'
     */

    public function store(storeEgresados $request)
    {
        $egresado = new Egresados($request->all());
        $egresado->no_control = $request->get('no_control');
        $egresado->nombre = $request->get('nombre');
        $egresado->sexo = $request->get('sexo');
        $egresado->estado_civil = $request->get('estado_civil');
        $egresado->nacimiento = $request->get('nacimiento');
        $egresado->curp = $request->get('curp');
        $egresado->telefono = $request->get('telefono');
        $egresado->celular = $request->get('celular');
        $egresado->email = $request->get('email');
        $egresado->fecha_egreso = $request->get('fecha_egreso');
        $egresado->promedio = $request->get('promedio');
        $egresado->password = $request->get('no_control');

        $city=$request->get('ciudad_id');

        if(!is_numeric($city)){
            $newCity = Ciudades::firstOrCreate(
                ['estado_id' => $request->get('estado_id'),
                    'nombre' => ucwords($city)]);
            $egresado->ciudad_id = $newCity->id;
        }else{
            $egresado->ciudad_id = $city;
        }

        $carrera=$request->get('carrera_id');

        if(!is_numeric($carrera)){
            $newCarrera = Carreras::firstOrCreate(['nombre' => ucwords($carrera)]);
            $egresado->carrera_id = $newCarrera->id;
        }else{
            $egresado->carrera_id = $carrera;
        }

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $file = $imagen->store('imagenes/cursos');
            $egresado->imagen = $file;
        }

        $user = User::create([
            'name' => $request->get('no_control'),
            'email' => $request->get('no_control'),
            'password' => Hash::make($request->get('no_control')),
            'isAdmin' => 0,
            'isRoot' => 0,
        ]);
        $egresado->user_id =  $user->id;
        $egresado->save();
        return redirect()->route('egresados.show',$egresado);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $egresado = Egresados::where('id',$id)->first();
        return view('egresados.show',compact('egresado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $carerras = Carreras::orderBy('nombre')->pluck('nombre','id');
        $ciudades = Ciudades::orderBy('nombre')->pluck('nombre', 'id');
        $egresado = Egresados::where('id',$id)->first();
        return view('egresados.edit', compact('egresado','id','carerras','ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeEgresados $request, $id)
    {
        $egresado = Egresados::where('id',$id)->first();
        $egresado->no_control = $request->get('no_control');
        $egresado->nombre = $request->get('nombre');
        $egresado->sexo = $request->get('sexo');
        $egresado->estado_civil = $request->get('estado_civil');
        $egresado->nacimiento = $request->get('nacimiento');
        $egresado->curp = $request->get('curp');
        $egresado->telefono = $request->get('telefono');
        $egresado->celular = $request->get('celular');
        $egresado->email = $request->get('email');
        $egresado->fecha_egreso = $request->get('fecha_egreso');
        $egresado->promedio = $request->get('promedio');
        $egresado->password = $request->get('no_control');

        $city=$request->get('ciudad_id');

        if(!is_numeric($city)){
            $newCity = Ciudades::firstOrCreate(['nombre' => ucwords($city)]);
            $egresado->ciudad_id = $newCity->id;
        }else{
            $egresado->ciudad_id = $city;
        }

        $carrera=$request->get('carrera_id');

        if(!is_numeric($carrera)){
            $newCarrera = Carreras::firstOrCreate(['nombre' => ucwords($carrera)]);
            $egresado->carrera_id = $newCarrera->id;
        }else{
            $egresado->carrera_id = $carrera;
        }

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $file = $imagen->store('imagenes/cursos');
            $egresado->imagen = $file;
        }

        $egresado->save();
        return redirect()->route('egresados.show',$egresado);
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
}
