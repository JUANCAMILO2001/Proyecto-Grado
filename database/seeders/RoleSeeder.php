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
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'cocinero']);
        $role3 = Role::create(['name' => 'usuario']);



        //Permiso admin Dashboard
        Permission::create([
            'name' => 'admin.dashboard',
            'description'=> 'Ver dashboard del Admin y cocinero'
        ])->syncRoles([$role1, $role2]);

        //permiso para crear usuario
        Permission::create([
            'name' => 'admin.users.index',
            'description'=> 'Lista de usuarios Disponibles'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.create',
            'description'=> 'Creacion de usuarios'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.edit',
            'description'=> 'Edicion de usuarios'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.show',
            'description'=> 'Ver detalles de usuario'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.users.destroy',
            'description'=> 'Eliminar usuario'
        ])->syncRoles([$role1]);

    }
}
