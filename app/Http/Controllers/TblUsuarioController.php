<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Tbl_usuario;
use App\Models\Tbl_role;

class TblUsuarioController extends Controller
{
    public function index(){
        $usuarios = Tbl_usuario::all();
        return response()->json([
            'status' => 'success',
            'data' => [
                'usuario' => $usuarios
            ]
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make( $request->all(),[
            'nombre' => 'required|string|max:255',
            'primer_apellido' => 'required|string|max:255',
            'segundo_apellido' => 'required|string|max:255',
            'nom_usuario' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:tbl_usuarios',
            'password' => 'required|string|min:6|confirmed',
        ] );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = Tbl_usuario::create([
            'nombre' => $request->nombre,
            'primer_apellido' => $request->primer_apellido,
            'segundo_apellido' => $request->segundo_apellido,
            'nom_usuario' => $request->nom_usuario,
            'correo' => $request->correo,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
        ]);
    }

    public function show($id)
    {
        $users = Tbl_usuario::find($id);
        $roles = Tbl_role::all();
        return response()->json([
            'status' => 'success',
            'data' => [
                'users' => $users,
                'roles' => $roles
            ]
        ]);
    }

    public function update(Request $request , $id){
        $validator = Validator::make( $request->all(),[
            'correo' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ] );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = Tbl_usuario::find($id);
        $user->roles()->sync( $request->roles );
            $user->correo   = $request->correo;
            $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario actualizado correctamente',
            'data' => [
                'usuario' => $user,
            ]
        ]);
    }

    public function destroy( $id){
        $user = Tbl_usuario::find($id);
        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario eliminado correctamente',
            'data' => [
                'usuario' => $user
            ]
        ]);
    }
}
