<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use Inertia\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Roles::paginate(25);
        return inertia('Roles/Index',['datos' => $roles]);
    }

    //listar 
    public function listar()
    {
        $roles = Roles::all();
        return response()->json(['res'=>true,'roles' => $roles]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->all();
        try {
            $rol= array();
            $rol['name']=$data['name'];
            $rol['guard_name']='web';
            $res = Roles::create($rol);
            if($res){
                return response()->json(['res'=>true,'ROL'=>$res]);
            }
        } catch (\Exception $e) {
            var_dump('Error al crear rol');die($e);
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
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if($request->id){
            $rol=Roles::where('id',$request->id)->first();
            $res = $rol->delete();
            return response()->json(['res'=>true,'rol'=>$rol]);
        }
    }
}
