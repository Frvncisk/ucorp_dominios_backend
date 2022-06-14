<?php

namespace App\Http\Controllers;

use App\Models\Tbl_computadores_modelos_marca;
use Illuminate\Support\Facades\Validator;
use App\Models\Tbl_computadores_modelo;
use App\Models\Tbl_computador;
use Illuminate\Http\Request;

class TblComputadoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function data()
    {
        $modelos = Tbl_computadores_modelo::all()->pluck('nombre' , 'id');
        $marcas = Tbl_computadores_modelos_marca::all()->toArray();
        return response()->json([
            'status' => 'success',
            'data' => [
                'modelos' => $modelos,
                'marcas' => $marcas,
            ]
        ]);
    }

    public function index()
    {
        $computadores = Tbl_computador::
            with('modelo' , 'personal')
        ->paginate();
        return response()->json([
            'status' => 'success',
            'data' => [
                'computadores' => $computadores,
            ]
        ]);
    }

    public function store( Request $request )
    {
        $validator = Validator::make( $request->all(),[
            'modelo_id'     => 'required|numeric',
            'personal_id'   => 'required|numeric',
            'codigo'        => 'required|string|max:6|unique:tbl_computadores,codigo',
        ] );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $computador = Tbl_computador::create([
            'modelo_id'     => $request->modelo_id,
            'personal_id'   => $request->personal_id,
            'codigo'        => $request->codigo,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Computador creado correctamente',
            'data' => [
                'servicio_lapso' => $computador,
            ]
        ]);
    }

    public function show($id)
    {
        $computador = Tbl_computador::with('modelo' , 'personal')->find($id);
        return response()->json([
            'status' => 'success',
            [
                'data' => [
                    'computador' => $computador,
                ]
            ]
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make( $request->all(),[
            'modelo_id'     => 'required|numeric',
            'personal_id'   => 'required|numeric',
            'codigo'        => 'required|string|max:6|unique:tbl_computadores,codigo',
        ] );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $computador = Tbl_computador::find($id)->update([
            'modelo_id'     => $request->modelo_id,
            'personal_id'   => $request->personal_id,
            'codigo'        => $request->codigo,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Computador actualizado correctamente',
            'data' => [
                'computador' => $computador,
            ]
        ]);
    }

    public function destroy($id)
    {
        $computador = Tbl_computador::find($id);
        $computador->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Computador eliminado satisfactoriamente',
            'data' => [
                'computador' => $computador,
            ]
        ]);
    }

    public function desactive($id)
    {
        $computador = Tbl_computador::find($id);
            $computador->activo = false;
        $computador->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Computador desactivado satisfactoriamente',
            'data' => [
                'computador' => $computador,
            ]
        ]);
    }
}
