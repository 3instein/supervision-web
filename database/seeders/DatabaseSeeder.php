<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tier;
use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use App\Models\Table;
use App\Models\Voucher;
use App\Models\Customer;
use App\Models\Transaction;
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
        Tier::create([
            'name' => 'Bronze',
            'description' => 'Bronze Tier',
            'image' => 'bronze.png',
            'points' => 5000,
        ]);
        Tier::create([
            'name' => 'Silver',
            'description' => 'Silver Tier',
            'image' => 'silver.png',
            'points' => 10000,
        ]);
        Tier::create([
            'name' => 'Gold',
            'description' => 'Gold Tier',
            'image' => 'gold.png',
            'points' => 15000,
        ]);
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

        Voucher::create(
            [
                'tier_id' => 1,
                'name' => 'Test Voucher',
                'description' => 'Test Voucher',
                'minimal' => 10000,
                'discount' => 10000,
            ]
        );

    }
}
