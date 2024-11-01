<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json(['res'=>true, 'usuarios'=>$user]);
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
            $res = User::create($user);
            return response()->json(['res'=>true, 'usuario'=>$res ]);
        } catch (\Exception $e) {
            var_dump('Error al crear usuario');die($e);
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
            $user = User::where('id',$request->id)->first();
        return response()->json([
            "Estado"=>"Ok",
            "Mensaje"=>"Exitoso",
            "Usuario" => $user
     ]);
            
        } catch (\Exception $e) {
            var_dump('Error al editar usuario');die($e);
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
            $data = $request->all();
            $user = User::where('id',$data['id'])->first();
               if(isset($data['name'])){
                $user->name = $data['name'];
               }
               if(isset($data['email'])){
                $user->email = $data['email'];
               }if(isset($data['password'])){
                $user->password = Hash::create($data['password']);
               }

            $user->save();
            return response()->json(['res'=>true, 'usuario'=>$user]);
        } catch (\Exception $e) {
            var_dump('Error al editar usuario');die($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $user = User::find(strval($request->id));
            $user->delete();
        return response()->json([
            "Estado"=>"Ok",
            "Mensaje"=>"Usuario eliminado con exito",
            "Usuario" => $user
     ]);
            
        } catch (\Exception $e) {
            var_dump('Error al editar usuario');die($e);
        }
    }
}
