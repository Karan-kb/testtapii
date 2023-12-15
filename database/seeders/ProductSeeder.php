<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * 
     */
    
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for($i=0; $i>10;$i++){
            Product::create([
                'name'=>$faker->sentence,
                'price'=>$faker->price,
                'stock'=>$faker->stock,


            ]);
        }
        
    }
}
