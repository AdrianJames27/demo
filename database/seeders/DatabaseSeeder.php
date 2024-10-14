<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seed items
        DB::table('items')->insert([
            [
                'name' => 'Max Candy (orange)',
                'price' => 10.99,
                'quantity' => 100,
                'is_active' => 0,
            ],
            [
                'name' => 'iCool',
                'price' => 15.50,
                'quantity' => 50,
                'is_active' => 1,
            ],
            [
                'name' => 'Chocnut',
                'price' => 7.25,
                'quantity' => 200,
                'is_active' => 2,
            ],
            [
                'name' => 'Bubble Joe Pro Plus',
                'price' => 17.25,
                'quantity' => 235,
                'is_active' => 3,
            ],
            [
                'name' => 'Boy Bawang Medium',
                'price' => 10.25,
                'quantity' => 250,
                'is_active' => 2,
            ],
            [
                'name' => 'Sour Gummy Worms',
                'price' => 5.99,
                'quantity' => 150,
                'is_active' => 1,
            ],
            [
                'name' => 'Chocolate Bar',
                'price' => 2.50,
                'quantity' => 300,
                'is_active' => 1,
            ],
            [
                'name' => 'Potato Chips',
                'price' => 3.75,
                'quantity' => 120,
                'is_active' => 1,
            ],
            [
                'name' => 'Fruit Snacks',
                'price' => 4.50,
                'quantity' => 80,
                'is_active' => 1,
            ],
            [
                'name' => 'Gummy Bears',
                'price' => 6.00,
                'quantity' => 200,
                'is_active' => 1,
            ],
        ]);

        // Seed orders
        DB::table('orders')->insert([
            [
                'transaction_no' => 'TXN001',
                'customer_name' => 'John Doe',
                'status' => 1,
            ],
            [
                'transaction_no' => 'TXN002',
                'customer_name' => 'Jane Smith',
                'status' => 1,
            ],
            [
                'transaction_no' => 'TXN003',
                'customer_name' => 'Alice Johnson',
                'status' => 2,
            ],
            [
                'transaction_no' => 'TXN004',
                'customer_name' => 'Bob Brown',
                'status' => 3,
            ],
            [
                'transaction_no' => 'TXN005',
                'customer_name' => 'Charlie Davis',
                'status' => 0,
            ],
        ]);

        // Seed order_items
        DB::table('order_items')->insert([
            [
                'order_id' => 1,
                'items_id' => 1,
            ],
            [
                'order_id' => 1,
                'items_id' => 2,
            ],
            [
                'order_id' => 2,
                'items_id' => 3,
            ],
            [
                'order_id' => 1,
                'items_id' => 6,
            ],
            [
                'order_id' => 2,
                'items_id' => 4,
            ],
            [
                'order_id' => 2,
                'items_id' => 5,
            ],
            [
                'order_id' => 3,
                'items_id' => 7,
            ],
            [
                'order_id' => 3,
                'items_id' => 8,
            ],
            [
                'order_id' => 3,
                'items_id' => 9,
            ],
        ]);
    }
}
