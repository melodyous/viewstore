<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $table->id();
        // $table->foreignId('category_id');
        // $table->string('product_id');
        // $table->string('name');
        // $table->integer('price');
        // $table->integer('stock');
        // $table->timestamps();

        Product::create([
            'category_id' => 1,
            'product_id' => 'amd-a8-7680-apu-fm2+',
            'name' => 'AMD A8-7680 APU - FM2+',
            'price' => 610000,
            'stock' => 100,
            'image' => '/storage/product-images/a8.jpg'
        ]);

        Product::create([
            'category_id' => 1,
            'product_id' => 'amd-ryzen-3-3200g-am4',
            'name' => 'AMD Ryzen 3 3200G AM4',
            'price' => 1390000,
            'stock' => 50,
            'image' => '/storage/product-images/ryzen3.jpg'
        ]);



        User::create([
            'name' => 'Siska Rahmawati',
            'username' => 'sisk123',
            'email' => 'siskarahmawati@gmail.com',
            'password' => bcrypt('password'),
            'isAdmin' => true
        ]);
    }
}
