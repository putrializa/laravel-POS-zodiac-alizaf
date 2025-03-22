<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;



// class CategorySeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         Schema::disableForeignKeyConstraints();
//         Category::truncate();
//         Schema::enableForeignKeyConstraints();
//         $file = File::get('database/data/converted_data.json');
//         $data = json_decode($file);
//         foreach ($data as $item) {
//             Category::create([
//                 'id' => $item->id,
//                 'name' => $item->name,
                
//             ]);
//         Category::factory()->count(50)->create();
//     }
// }
