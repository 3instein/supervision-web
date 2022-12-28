<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Table;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\MenuSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        Store::create([
            'name' => 'Test Store',
            'address' => 'Jl. Test',
        ]);

        Table::factory(5)->create();
        $this->call([
            MenuSeeder::class,
        ]);
        User::create(
            [
                'name' => 'Test User',
                'username' => 'test',
                'password' => Hash::make('test'),
            ]
        );
        Customer::create(
            [
                'name' => 'Test Customer',
                'email' => 'customer@gmail.com',
                'password' => Hash::make('test'),
                'points' => 0
            ]
        );
        // $order = Order::create(
        //     [
        //         'customer_id' => 1,
        //         'table_id' => 1,
        //     ]
        // );

        // $order->menus()->attach(1, ['quantity' => 1, 'note' => 'Test Note']);
        Voucher::create(
            [
                'name' => 'Test Voucher',
                'description' => 'Test Voucher',
                'minimal' => 10000,
                'discount' => 10000,
            ]
        );
        // Transaction::create([
        //     'order_id' => 1,
        //     'voucher_id' => 1,
        //     'confirmed_by' => null,
        //     'total' => 10000,
        //     'payment_method' => 'Cash',
        //     'status' => 'Unpaid',
        // ]);



        
    }
}
