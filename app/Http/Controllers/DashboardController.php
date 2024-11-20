<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Models\Licencias;
use Inertia\Response;
use App\Models\User;
use App\Models\ModelHasRole;
use App\Models\Roles;

class DashboardController extends Controller
{
    public function index () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);   
    }
    public function step2(Request $request){
        $id= explode('/',$request->getPathInfo())[2];
        $user = User::where('id',$id)->first();
        if ($user) {    
                $rols = ModelHasRole::where('model_id', $user->id)->first();
                if (isset($rols->role_id)) {

                    $user->rol = Roles::where('id', $rols->role_id)->first();
                }
                $user->licencias = Licencias::where('id_usuario',$id)->get();
                 
            }
        
        return Inertia::render('step2',['usuario'=>$user]);
    }
    public function calendar(){
        return Inertia::render('Calendar');
    }
    public function reportes(){
        return Inertia::render('Reportes/Index');
    }

    public function dashboard () {
        return Inertia::render('Dashboard');
    }
    public function formularioSalud () {
        return Inertia::render('FormularioSalud');
    }
    public function documentos () {
        return Inertia::render('CargaDocumentos');
    }
    public function finalizado () {
        return Inertia::render('FinalizacionProceso');
    }
}
