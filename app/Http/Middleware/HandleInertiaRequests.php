<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use stdClass;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            //
            'csrf_token' =>csrf_token(),
            'user.roles' => $request->user() ? $request->user()->roles->pluck('name'): [],
            'user.permission' => $request->user() ? $request->user()->getPermissionsViaRoles()->pluck('name'): [],
            'files' => array(
                array(
                    'id'=>1,
                    'Nombre'=>'Cedula de identidad',
                    'estado' => 'Pendiente',
                
                ),
                array(
                    'id'=>2,
                    'Nombre'=>'Cedula de identidad reverso',
                    'estado' => 'Pendiente',
                    
                ),
                array(
                    'id'=>3,
                    'Nombre'=>'Certificado de estudios',
                    'estado' => 'Pendiente',
                    
                ),
                array(
                    'id'=>4,
                    'Nombre'=>'Certificado residencia',
                    'estado' => 'Pendiente',
                    
                ),
                array(
                    'id'=>5,
                    'Nombre'=>'Hoja de vida del conductor',
                    'estado' => 'Pendiente',
                    
                )
                ),
                'solicitud'=>new stdClass(),
        ]);

    }
}
