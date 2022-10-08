<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Əsas Kateqorya',
            'slug'=>'main',
        ]);

        // Category::create([
        //     'name'=>'Agaclar',
        //     'slug'=>_slug('Agaclar'),
        //     'category_id'=>1,
        // ]);
        // Category::create([
        //     'name'=>'Kollar',
        //     'slug'=>_slug('Kollar'),
        //     'category_id'=>1,
        // ]);
        
        // Category::create([
        //     'name'=>'Hemise Yaşıl',
        //     'slug'=>_slug('Hemise Yaşıl'),
        //     'category_id'=>2,
        // ]);
        // Category::create([
        //     'name'=>'Dekor',
        //     'slug'=>_slug('Dekor'),
        //     'category_id'=>2,
        // ]);
        // Category::create([
        //     'name'=>'Yaşıl Kollar',
        //     'slug'=>_slug('Yaşıl Kollar'),
        //     'category_id'=>3,
        // ]);
        // Category::create([
        //     'name'=>'Rengli Kollar',
        //     'slug'=>_slug('Rengli Kollar'),
        //     'category_id'=>3,
        // ]);
        

        // for ($i=1; $i <15 ; $i++) { 
        //     $categoryID = Category::all()->pluck('id')->toArray();
            
        //     Category::create([
        //         'category_id'=>$categoryID[array_rand($categoryID, 1)],
        //         'name'=>'Kataloq '.$i,
        //         'slug'=>_slug('Kataloq '.$i)
        //     ]);
        // }
    }
}
