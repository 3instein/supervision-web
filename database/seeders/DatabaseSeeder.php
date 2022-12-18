<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Database\Seeders\MenuSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Test User',
                'username' => 'test',
                'password' => Hash::make('test'),
            ]
        );
        Customer::create(
            [
                'email' => 'customer@gmail.com',
                'password' => Hash::make('test'),
                'points' => 0
            ]
        );
        Order::create(
            [
                'customer_id' => 1,
                'user_id' => 1,
            ]
        );
        Transaction::create([
            'order_id' => 1,
            'total' => 10000,
            'payment_method' => 'Cash',
            'status' => 'Unpaid',
        ]);

        Store::create([
            'name' => 'Test Store',
            'address' => 'Jl. Test',
        ]);

        $this->call([
            MenuSeeder::class,
        ]);
    }
}
