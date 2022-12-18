<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::insert([
            [
                'name' => 'Nasi Goreng',
                'price' => 10000,
                'description' => 'Nasi goreng yang enak',
                'image' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1472&q=80',
            ],
            [
                'name' => 'Nasi Hainan',
                'price' => 30000,
                'description' => 'Nasi hainan yang enak',
                'image' => 'https://images.unsplash.com/photo-1541832676-9b763b0239ab?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1320&q=80',
            ],
            [
                'name' => 'Wagyu Tomahawk',
                'price' => 180000,
                'description' => 'Wagyu Tomahawk yang enak',
                'image' => 'https://images.unsplash.com/photo-1615937657715-bc7b4b7962c1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80',
            ],
            [
                'name' => 'Spaghetti Bolognase',
                'price' => 35000,
                'description' => 'Spaghetti Bolognase yang enak',
                'image' => 'https://images.unsplash.com/photo-1598866594230-a7c12756260f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1308&q=80'
            ]
        ]);
    }
}
