<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interesado;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Validator;

use App\Exports\InteresadosExport;
use Maatwebsite\Excel\Facades\Excel;


class InteresadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.interesados');
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
        // $interesado = new Interesado;

        $validate = Validator::make($request->all(), [
            'nombre' => 'required|min:5|regex:/^[\pL\s\-]+$/u',
            'correo' => 'required|email:strict',
            'telefono' => 'required|regex:/^[\+0-9(\)\s]*$/',
            'ciudad' => 'required||regex:/^[\pL\s\-]+$/u',
            'pais' => 'required||regex:/^[\pL\s\-]+$/u',
            'proyecto_id' => 'required|numeric',
        ]);
        if($validate->fails()){
            return response()->json($validate->errors());
        } else {

            $nombre = $request->input('nombre');
            $correo = $request->input('correo');
            $telefono = $request->input('telefono');
            $ciudad = $request->input('ciudad');
            $pais = $request->input('pais');
            $proyecto_id = $request->input('proyecto_id');
            date_default_timezone_set('america/bogota');
            $fecha_ayer = date("Y-m-d H:i:s",strtotime("-1 days"));

            $interesado = new Interesado;

            $interesado->nombre = $nombre;
            $interesado->correo = $correo;
            $interesado->telefono = $telefono;
            $interesado->ciudad = $ciudad;
            $interesado->pais = $pais;
            $interesado->proyecto_id = $proyecto_id;
            $interesado->fecha = date("Y-m-d H:i:s");

            // validar si el proyecto existe
            $proyecto = Proyecto::where('id',$proyecto_id)->get();

            if (!count($proyecto) == 0) {

                // validar si el usuario ya diligenció el formulario              
                $interesados = Interesado::where('correo',$correo)
                                        ->where('proyecto_id', $proyecto_id)
                                        ->orderBy('id', 'desc')
                                        ->get();

                if (!count($interesados) == 0) {

                    foreach ($interesados as $key => $value) {

                            if ( $fecha_ayer > $value['fecha'] ) {

                                // return response()->json('ya escribio pero han pasado más de 24 horas y puede guardar');
                                $interesado->save();

                                return $request;

                            } else {

                                return response()->json('En las últimas 24 horas ha solitado información de este proyecto');  
                                
                            }
                    } 

                } else {

                    // return response()->json('no hay coincidencias de interesados y puede guardar');
                    $interesado->save();

                    return $request;
                }
                
            } else {

                return response()->json('el proyecto no existe');
                
            }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interesado  $interesado
     * @return \Illuminate\Http\Response
     */
    public function show(Interesado $interesado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interesado  $interesado
     * @return \Illuminate\Http\Response
     */
    public function edit(Interesado $interesado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interesado  $interesado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interesado $interesado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interesado  $interesado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interesado $interesado)
    {
        //
    }

    // Datos a exportar
    public function export() 
    {
        $export = new InteresadosExport([]);
        return Excel::download($export, 'interesados.xlsx');
    }

}
