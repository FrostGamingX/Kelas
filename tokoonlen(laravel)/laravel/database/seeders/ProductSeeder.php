<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Smartphone XYZ',
                'description' => 'Latest smartphone with advanced features and high-resolution camera.',
                'price' => 2500000,
                'category_id' => 1
            ],
            [
                'name' => 'Laptop Pro',
                'description' => 'Powerful laptop for professional use with high performance.',
                'price' => 8000000,
                'category_id' => 1
            ],
            [
                'name' => 'Men\'s T-Shirt',
                'description' => 'Comfortable cotton t-shirt for everyday wear.',
                'price' => 150000,
                'category_id' => 2
            ],
            [
                'name' => 'Novel: The Adventure',
                'description' => 'Bestselling novel about an epic adventure.',
                'price' => 85000,
                'category_id' => 3
            ],
            [
                'name' => 'Kitchen Blender',
                'description' => 'High-powered blender for all your kitchen needs.',
                'price' => 350000,
                'category_id' => 4
            ],
            [
                'name' => 'Basketball',
                'description' => 'Professional basketball for indoor and outdoor play.',
                'price' => 120000,
                'category_id' => 5
            ],
            [
                'name' => 'Remote Control Car',
                'description' => 'Fun remote control car for kids and adults.',
                'price' => 250000,
                'category_id' => 6
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
