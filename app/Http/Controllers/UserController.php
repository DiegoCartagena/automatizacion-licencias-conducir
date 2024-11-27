<?php

namespace App\Http\Controllers;

use App\Models\Licencias;
use Illuminate\Http\Request;
use Hash;
use Inertia\Response;
use App\Models\User;
use App\Models\ModelHasRole;
use App\Models\Roles;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        if (count($users) > 0) {
            foreach ($users as $key => $user) {
                $rols = ModelHasRole::where('model_id', $user->id)->first();
                if (isset($rols->role_id)) {

                    $user->rol = Roles::where('id', $rols->role_id)->first();
                }
                $user->licencias = Licencias::where('id_usuario',$user->id)->get();
            }
            $roles = Roles::all();
            return inertia('Users/Index', ['usuarios' => $users , 'roles'=>$roles]);
        } else {
            return response()->json(['res' => false]);
        }
    }

    public function listar()
    {
        $users = User::all();
        if (count($users) > 0) {
            foreach ($users as $key => $user) {
                $rols = ModelHasRole::where('model_id', $user->id)->first();
                if (isset($rols->role_id)) {

                    $user->rol = Roles::where('id', $rols->role_id)->first();
                }
                $user->licencias = Licencias::where('id_usuario',$user->id)->get();
                // var_dump($user->rol);die;
            }
            return response()->json(['res' => true, 'usuarios' => $users]);
        } else {
            return response()->json(['res' => false]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->all();
        try {

            $user = array();
            $user['name'] = $data['name'];
            $user['email'] = $data['email'];
            $user['password'] = Hash::make($data['password']);
            $user['rut'] = $data['rut'];
            $user['telefono'] = $data['telefono'];
            $user['aPaterno'] = $data['aPaterno'];
            $user['aMaterno'] = $data['aMaterno'];
            $user['fechaNacimiento'] = date('Y-m-d', strtotime($data['fechaNacimiento']));
            $user['estadoCivil'] = $data['estadoCivil'];
            $user['sexo'] = $data['sexo'];
            $user['nacionalidad'] = $data['nacionalidad'];
            $user['profesion'] = $data['profesion'];
            $user['region']  =$data['region'];
            $user['comuna'] = $data['comuna'];
            $user['calle'] =$data['calle'];
            $user['numero'] = $data['numero'];
            $user['block_torre'] = $data['block_torre'];
            $user['dpto_casa_local'] = $data['dpto_casa_local'];
            $user['referencia'] = $data['referencia'];
            $res = User::create($user);
       
            /**Crea el Rol y lo asigna al usuario */
            if (isset($data['rol'])) {
                $res->rol = Roles::where('name', $data['rol'])->first(); 
                $res->assignRole($data['rol']); // asigna el rol al usuario
            } else {
                $res->rol = Roles::where('name', 'usuario')->first();
                $res->assignRole('usuario');
            }
            
                if ($res) // si se crea el usuario 
                {
                    return response()->json(['res' => true, 'usuario' => $res]);
                } else {
                    return response()->json(['res' => false]);
                }
            
        } catch (\Exception $e) {
            var_dump('Error al crear usuario');
            die($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $user = User::where('id', $request->id)->first();

            if ($user) {
                return response()->json(['res' => true, 'usuario' => $user]);
            } else {
                return response()->json(['res' => false, 'usuario' => 'no existe el usuario con el id: ' . $request->id]);
            }
        } catch (\Exception $e) {
            var_dump('Error al editar usuario');
            die($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            //var_dump($request->all());die;
            $data = $request->all();
            $user = User::where('id', $data['id'])->first();
            if (isset($data['name'])) {
                $user->name = $data['name'];
            }
            if (isset($data['email'])) {
                $user->email = $data['email'];
            }
            if (isset($data['password'])) {
                $user->password = Hash::make($data['password']);
            }
            if (isset($data['telefono'])) {
                $user->telefono = $data['telefono'];
            }
            if (isset($data['fechaNacimiento'])) {
                $user->fechaNacimiento = $data['fechaNacimiento'];
            }
            if (isset($data['aPaterno'])) {
                $user->aPaterno = $data['aPaterno'];
            }
            if (isset($data['aMaterno'])) {
                $user->aMaterno = $data['aMaterno'];
            }
            if (isset($data['estadoCivil'])) {
                $user->estadoCivil = $data['estadoCivil'];
            }
            if (isset($data['sexo'])) {
                $user->sexo = $data['sexo'];
            }
            if (isset($data['nacionalidad'])) {
                $user->nacionalidad = $data['nacionalidad'];
            }
            if (isset($data['profesion'])) {
                $user->profesion = $data['profesion'];
            }
            if (isset($data['region'])) {
                $user->region = $data['region'];
            }
            if (isset($data['comuna'])) {
                $user->comuna = $data['comuna'];
            }
            if (isset($data['calle'])) {
                $user->calle = $data['calle'];
            }
            if (isset($data['numero'])) {
                $user->numero = $data['numero'];
            }
            if (isset($data['dpto_casa_local'])) {
                $user->dpto_casa_local= $data['dpto_casa_local'];
            }
            if (isset($data['block_torre'])) {
                $user->block_torre = $data['block_torre'];
            }
            if (isset($data['referencia'])) {
                $user->referencia = $data['referencia'];
            }
            $user->save();
            return response()->json(['res' => true, 'usuario' => $user]);
        } catch (\Exception $e) {
            var_dump('Error al editar usuario');
            die($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
            
        try {
            $user = User::find($request->id);
            if ($user) {
                $user->delete();
                return response()->json(['res' => true, 'usuario' => $user]);
            } else {
                return response()->json(['res' => false, 'mensaje' => 'El usuario ya fue eliminado anteriormente']);
            }
        } catch (\Exception $e) {
            var_dump('Error al editar usuario');
            die($e);
        }
    }
}
