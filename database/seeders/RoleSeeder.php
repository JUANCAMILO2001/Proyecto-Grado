<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class   RoleSeeder extends Seeder
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
            'description'=> 'Ver dashboard del Admin'
        ])->syncRoles([$role1]);

        //Permiso cocinero Dashboard
        Permission::create([
            'name' => 'admin.Cocinero',
            'description'=> 'Ver dashboard cocinero'
        ])->syncRoles([$role2]);

        //permiso para crear Productos
        Permission::create([
            'name' => 'admin.products.index',
            'description'=> 'Lista de Productos Disponibles'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.products.create',
            'description'=> 'Creacion de Productos'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.products.edit',
            'description'=> 'Edicion de Productos'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.products.show',
            'description'=> 'Ver detalles de Producto'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.products.destroy',
            'description'=> 'Eliminar Producto'
        ])->syncRoles([$role1]);


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

        //Permisos admin Roles
        Permission::create([
            'name' => 'admin.roles.index',
            'description'=> 'Lista de Estados Disponibles'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.create',
            'description'=> 'Creacion de Estados'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.edit',
            'description'=> 'Edicion de Estados'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.show',
            'description'=> 'Ver detalles de Estado'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.roles.destroy',
            'description'=> 'Eliminar Estados'
        ])->syncRoles([$role1]);

        //Permisos admin Bills
        Permission::create([
            'name' => 'admin.bills.index',
            'description'=> 'Lista de Pedidos pendientes'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'admin.bills.entregadosa',
            'description'=> 'Lista de Pedidos entregados'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.bills.create',
            'description'=> 'Creación del Pedido'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.bills.edit',
            'description'=> 'Edicion del Pedido'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.bills.show',
            'description'=> 'Ver detalles del Pedido'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.bills.destroy',
            'description'=> 'Eliminar Pedido'
        ])->syncRoles([$role1]);

        //permiso de informe
        Permission::create([
            'name' => 'admin.charts',
            'description'=> 'Informe Ventas'
        ])->syncRoles([$role1]);

    }
}
