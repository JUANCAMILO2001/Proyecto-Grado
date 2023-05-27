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

        State::create([
            'name' => 'Disponible',
        ]);

        User::create([
            'names' => 'Camilo',
            'lastnames' => 'Ramirez',
            'document_number' => '12222',
            'email' => 'camilo@gmail.com',
            'password' => Hash::make('admin1'),
            'phone' => '12233',
            'document_type' => '111',
            'state_id' => '1',
        ]);

        Product::create([
            'imagen' => 'perrocaliente.png',
            'name' => 'Perro Caliente',
            'description' => 'Perro especial',
            'pay' => '20000',
            'state_id' => '1',
        ]);

        Bills::create([
            'state_pay' => 'pendiente',
            'user_id' => '1',
            'state_id' => '1',
        ]);


        Pay::create([
            'pay_method' =>'Efectivo',
            'pay_total' =>'20000',
        ]);

        Comment::create([
            'detail' => 'sin cebolla y con doble huvo de codorniss',
        ]);
        $fecha = Carbon::create(2023, 5, 26);
        Orders::create([
            'fecha' => $fecha,
            'description' => 'ass sss',
            'pay_id' => '1',
            'comment_id' => '1',
        ]);

        OrderBills::create([
            'order_id' => '1',
            'bill_id' => '1',
        ]);

        BillProducts::create([
            'product_id' => '1',
            'bill_id' => '1',
        ]);

    }
}
