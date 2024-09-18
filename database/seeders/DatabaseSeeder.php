<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
             'name' => 'Kreisler ',
             'last_name'=>'Umbo Ruiz',
             'document_type'=>'1',
             'document_number'=>'44359286',
             'email' => 'umbosac@gmail.com',
             'phone'=>'950917606',
             'password' => bcrypt('12345678')
         ]);

        $this->call([
            FamilySeeder::class,
            OptionSeeder::class,
        ]);

        Product::factory(100)->create();
    }
}
