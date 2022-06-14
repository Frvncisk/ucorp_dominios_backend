<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Tbl_tipos_de_servicio;
use App\Models\Tbl_servicio;
use Illuminate\Http\Request;

class TblTiposDeServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $tipos_de_servicios = Tbl_tipos_de_servicio::get();
        return response()->json([
            'status' => 'success',
            'data' => [
                'tipos_de_servicios' => $tipos_de_servicios,
            ]
        ]);
    }

    public function store( Request $request )
    {
        $validator = Validator::make( $request->all(),[
            'nombre_servicio' => 'required|string|max:200',
        ] );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $tipo_de_servicio = Tbl_tipos_de_servicio::create([
            'nombre_servicio' => $request->nombre_servicio,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Tipo de Servicio creado correctamente',
            'data' => [
                'tipo_de_servicio' => $tipo_de_servicio,
            ]
        ]);
    }

    public function show($id)
    {
        $tipo_de_servicio = Tbl_tipos_de_servicio::find($id);
        return response()->json([
            'status' => 'success',
            [
                'data' => [
                    'tipo_de_servicio' => $tipo_de_servicio,
                ]
            ]
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make( $request->all(),[
            'nombre_servicio' => 'required|string|max:200',
        ] );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $tipo_de_servicio = Tbl_tipos_de_servicio::find($id)->update([
            'nombre_servicio' => $request->nombre_servicio,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Tipo de servicio actualizado correctamente',
            'data' => [
                'tipo_de_servicio' => $tipo_de_servicio,
            ]
        ]);
    }

    public function destroy($id)
    {
        $tipo_de_servicio = Tbl_tipos_de_servicio::find($id);
        $tipo_de_servicio->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Tipo de servicio eliminado satisfactoriamente',
            'data' => [
                'tipo_de_servicio' => $tipo_de_servicio,
            ]
        ]);
    }
}
