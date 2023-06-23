<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BillProducts;
use App\Models\Bills;
use App\Models\Comment;
use App\Models\OrderBills;
use App\Models\Orders;
use App\Models\Pay;
use App\Models\Product;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //$this->call(DocumentTypeSeeder::class);

        $this->call(RoleSeeder::class);

        //creacion de estados
        State::create([
            'name' => 'Disponible',
            'color' => '#289625',
        ]);
        State::create([
            'name' => 'No Disponible',
            'color' => '#BE162D',
        ]);
        State::create([
            'name' => 'Entregado',
            'color' => '#0CC620',
        ]);
        State::create([
            'name' => 'Pendiente',
            'color' => '#4C514C',
        ]);

        //creacion usuarios prueba
        User::create([
            'names' => 'Camilo',
            'lastnames' => 'Ramirez',
            'document_number' => '12222',
            'email' => 'camilo@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '12233',
            'document_type' => '111',
            'state_id' => '1',
            'address' => 'Calle falsa 123',
        ])->assignRole('admin');
        User::create([
            'names' => 'Esteban',
            'lastnames' => 'Escarraga',
            'document_number' => '12222',
            'email' => 'esteban@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '12233',
            'document_type' => '111',
            'state_id' => '1',
            'address' => 'Calle falsa 123',
        ])->assignRole('admin');
        User::create([
            'names' => 'Cocinero',
            'lastnames' => 'Delipizza',
            'document_number' => '12222',
            'email' => 'cocinero@gmail.com',
            'password' => Hash::make('cocinero'),
            'phone' => '12233',
            'document_type' => '111',
            'state_id' => '1',
            'address' => 'Calle falsa 123',
        ])->assignRole('cocinero');
        User::create([
            'names' => 'Usuario',
            'lastnames' => 'prueba',
            'document_number' => '12222',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('usuario'),
            'phone' => '12233',
            'document_type' => '111',
            'state_id' => '1',
            'address' => 'Calle falsa 123',
        ])->assignRole('usuario');


        //creacion de producto de prueba
        Product::create([
            'imagen' => 'perrocaliente.png',
            'name' => 'Perro Caliente',
            'description' => 'Perro especial',
            'pay' => '20000',
            'state_id' => '1',
        ]);



    }
}
