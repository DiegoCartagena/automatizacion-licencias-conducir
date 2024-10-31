<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //roles iniciales 
        $role_admin = Role::create(['name'=> 'admin']);
        $role_municipal = Role::create(['name'=> 'municipal']);
        $role_user = Role::create(['name'=> 'usuario']);

        $permission_crear_roles = Permission::create(['name' => 'crear roles']);
        $permission_leer_roles = Permission::create(['name' => 'leer roles']);
        $permission_actualizar_roles = Permission::create(['name' => 'actualizar roles']);
        $permission_eliminar_roles = Permission::create(['name' => 'eliminar roles']); 

            $permission_admin = [$permission_actualizar_roles,$permission_crear_roles,$permission_eliminar_roles,$permission_leer_roles ];
    
                $role_admin->syncPermissions($permission_admin);
    
        }
}
