<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    
    public function run(): void
{
    Product::create([
        'name' => 'Wireless Headphones',
        'description' => 'Noise-cancelling over-ear Bluetooth headphones.',
        'price' => 99.99,
        'stock' => 50,
        'image' => 'headphones.jpg',
    ]);

    Product::create([
        'name' => 'Smart Watch',
        'description' => 'Fitness tracking smartwatch with heart-rate monitor.',
        'price' => 149.99,
        'stock' => 30,
        'image' => 'smartwatch.jpg',
    ]);

    Product::create([
        'name' => 'USB-C Charger 65W',
        'description' => 'Fast charger for laptops and phones.',
        'price' => 39.99,
        'stock' => 80,
        'image' => 'charger.jpg',
    ]);

    Product::create([
        'name' => 'Wireless Mouse',
        'description' => 'Ergonomic 2.4GHz mouse with silent clicks.',
        'price' => 24.99,
        'stock' => 120,
        'image' => 'mouse.jpg',
    ]);

    }
}
