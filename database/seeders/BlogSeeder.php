<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 35; $i++) { 
            Blog::create([
                'name'=>'Blog '.$i,
                'slug'=>_slug('blog '.$i),
                'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, vitae consectetur neque quam voluptate fugit commodi similique magni quaerat soluta alias nihil repellendus? Ipsum quo distinctio, velit voluptas sapiente officiis.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum iste similique commodi eos, provident quam labore id incidunt distinctio, est quae? Possimus sint dolor animi quod nostrum soluta magni eligendi!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore aspernatur aperiam corrupti officia illum a porro quidem praesentium! Veniam, consectetur perspiciatis. Iusto ducimus blanditiis rem. Deleniti ducimus aperiam recusandae in?'
            ]);
        }
    }
}
