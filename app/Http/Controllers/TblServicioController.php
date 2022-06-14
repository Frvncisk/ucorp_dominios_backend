<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Tbl_tipos_de_servicio;
use App\Models\Tbl_servicio;
use Illuminate\Http\Request;

class TblServicioController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    public function index( Request $request)
    {
        $servicios = Tbl_servicio::with('tipo')
        ->servicioTipoId( $request->servicio_tipo_id )
        ->nombre( $request->nombre )
        ->get();
        return response()->json($servicios,
        );
    }

    public function data()
    {
        $tipos = Tbl_tipos_de_servicio::all();
        return response()->json([
            'status' => 'success',
            'data' => [
                'servicios_tipos' => $tipos,
            ]
        ]);
    }

    public function store( Request $request )
    {
        $validator = Validator::make( $request->all(),[
            'servicio_tipo_id' => 'required|numeric',
            'nombre' => 'required|string|max:200',
            'fecha_de_adquisicion' => [ 'required' , 'date' , 'before_or_equal:'.date('Y/m/d') ],
            'fecha_de_expiracion' => [ 'required' , 'date' ],
        ] );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $servicio = Tbl_servicio::create([
            'servicio_tipo_id' => $request->servicio_tipo_id,
            'nombre' => $request->nombre,
            'fecha_de_adquisicion' => $request->fecha_de_adquisicion,
            'fecha_de_expiracion' => $request->fecha_de_expiracion,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Servicio creado correctamente',
            'data' => [
                'servicio' => $servicio,
            ]
        ]);
    }

    public function show($id)
    {
        $servicio = Tbl_servicio::find($id);
        return response()->json([
            'status' => 'success',
                'data' => [
                    'servicio' => $servicio,
                ]
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make( $request->all(),[
            'servicio_tipo_id' => 'required|numeric',
            'nombre' => 'required|string|max:200',
            'fecha_de_adquisicion' => [ 'required' , 'date' , 'before_or_equal:'.date('Y/m/d') ],
            'fecha_de_expiracion' => [ 'required' , 'date' ],
        ] );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $servicio = Tbl_servicio::find($id)->update([
            'servicio_tipo_id' => $request->servicio_tipo_id,
            'nombre' => $request->nombre,
            'fecha_de_adquisicion' => $request->fecha_de_adquisicion,
            'fecha_de_expiracion' => $request->fecha_de_expiracion,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Servicio actualizado correctamente',
            'data' => [
                'servicio' => $servicio,
            ]
        ]);
    }

    public function destroy($id)
    {
        $servicio = Tbl_servicio::find($id);
        $servicio->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'servicio eliminado satisfactoriamente',
            'data' => [
                'servicio' => $servicio,
            ]
        ]);
    }
}
