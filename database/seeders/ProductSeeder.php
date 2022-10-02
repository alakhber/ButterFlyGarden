<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categoryID = Category::where('id','!=',1)->get()->pluck('id')->toArray();
        for ($i=1; $i <= 35; $i++) { 
            Product::create([
                'category_id'=>$categoryID[array_rand($categoryID, 1)],
                'name'=>'Məhsul '.$i,
                'slug'=>_slug('Məhsul '.$i),
                'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, vitae consectetur neque quam voluptate fugit commodi similique magni quaerat soluta alias nihil repellendus? Ipsum quo distinctio, velit voluptas sapiente officiis.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum iste similique commodi eos, provident quam labore id incidunt distinctio, est quae? Possimus sint dolor animi quod nostrum soluta magni eligendi!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore aspernatur aperiam corrupti officia illum a porro quidem praesentium! Veniam, consectetur perspiciatis. Iusto ducimus blanditiis rem. Deleniti ducimus aperiam recusandae in?'
            ]);
        }
    }
}
