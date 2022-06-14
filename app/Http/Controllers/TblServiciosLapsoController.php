<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Tbl_tipos_de_servicio;
use App\Models\Tbl_servicios_lapso;
use App\Models\Tbl_servicio;
use Illuminate\Http\Request;

class TblServiciosLapsoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function data()
    {
        $tipos_servicios = Tbl_tipos_de_servicio::all()->pluck('nombre_servicio' , 'id');
        return response()->json([
            'status' => 'success',
            'data' => [
                'tipos_servicios' => $tipos_servicios,
            ]
        ]);
    }

    public function index()
    {
        $servicios_lapsos = Tbl_servicios_lapso::
            with('tipo')
        ->get();
        return response()->json([
            'status' => 'success',
            'data' => [
                'servicios_lapsos' => $servicios_lapsos,
            ]
        ]);
    }

    public function store( Request $request )
    {
        $validator = Validator::make( $request->all(),[
            'servicio_tipo_id'  => 'required|numeric',
            'dias_minimos'      => 'required|numeric',
            'dias_maximos'      => 'required|numeric',
            'color'             => 'required|min:6|max:6'
        ] );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $servicio_lapso = Tbl_servicios_lapso::create([
            'servicio_tipo_id' => $request->servicio_tipo_id,
            'dias_minimos'     => $request->dias_minimos,
            'dias_maximos'     => $request->dias_maximos,
            'color'            => $request->color,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Lapso de Servicio creado correctamente',
            'data' => [
                'servicio_lapso' => $servicio_lapso,
            ]
        ]);
    }

    public function show($id)
    {
        $servicio_lapso = Tbl_servicios_lapso::with('tipo')->find($id);
        return response()->json([
            'status' => 'success',
            [
                'data' => [
                    'servicio_lapso' => $servicio_lapso,
                ]
            ]
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make( $request->all(),[
            'servicio_tipo_id'  => 'required|numeric',
            'dias_minimos'      => 'required|numeric',
            'dias_maximos'      => 'required|numeric',
            'color'             => 'required|min:6|max:6'
        ] );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $servicio_lapso = Tbl_servicios_lapso::find($id)->update([
            'servicio_tipo_id' => $request->servicio_tipo_id,
            'dias_minimos'     => $request->dias_minimos,
            'dias_maximos'     => $request->dias_maximos,
            'color'            => $request->color,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Lapso de servicio actualizado correctamente',
            'data' => [
                'servicio_lapso' => $servicio_lapso,
            ]
        ]);
    }

    public function destroy($id)
    {
        $servicio_lapso = Tbl_servicios_lapso::find($id);
        $servicio_lapso->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Lapso de servicio eliminado satisfactoriamente',
            'data' => [
                'servicio_lapso' => $servicio_lapso,
            ]
        ]);
    }
}
