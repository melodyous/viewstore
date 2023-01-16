<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
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

        $name = 'VenomRX VRX128 128GB 2.5" SATA III SSD';
        $name = strtolower($name);
        $name = str_replace(' ', '-', $name);
        Product::create([
            'category_id' => 2,
            'product_id' => $name,
            'name' => 'VenomRX VRX128 128GB 2.5" SATA III SSD',
            'price' => 170000,
            'stock' => 50,
            'image' => '/storage/product-images/venomrx.jpg'
        ]);

        $name = 'Asrock Radeon RX 6500 XT PHANTOM';
        $name = strtolower($name);
        $name = str_replace(' ', '-', $name);
        Product::create([
            'category_id' => 3,
            'product_id' => $name,
            'name' => 'Asrock Radeon RX 6500 XT PHANTOM',
            'price' => 2610000,
            'stock' => 50,
            'image' => '/storage/product-images/amdradeon.jpg'
        ]);

        $name = 'Asrock Radeon RX 6500 XT PHANTOM';
        $name = strtolower($name);
        $name = str_replace(' ', '-', $name);
        Product::create([
            'category_id' => 3,
            'product_id' => $name,
            'name' => 'Asrock Radeon RX 6500 XT PHANTOM',
            'price' => 2610000,
            'stock' => 50,
            'image' => '/storage/product-images/amdradeon.jpg'
        ]);




        Category::create([
            'category_id' => 'P-processor',
            'name' => 'Processor'
        ]);

        Category::create([
            'category_id' => 'P-storage',
            'name' => 'Storage'
        ]);

        Category::create([
            'category_id' => 'P-graphic-card',
            'name' => 'Graphic Card'
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
