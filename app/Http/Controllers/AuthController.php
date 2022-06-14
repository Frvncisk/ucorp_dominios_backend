<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Tbl_usuario;
use Error;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        #Solución 1
        $validator = Validator::make( $request->all(),[
            'nom_usuario' => 'required|string',
            'password' => 'required|string',
        ] );

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $credentials = $request->only('nom_usuario', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            // $token = Auth::attempt($credentials);
            if (! $token = Auth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials']+ ['status' => '401'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token')+ ['status'=>'ok']);




        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'error' => 'Invalid credentials',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function register(Request $request)
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

        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
