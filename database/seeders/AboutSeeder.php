<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'about'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur sapiente placeat natus porro et facilis autem adipisci perferendis dolor impedit, voluptas vitae eveniet incidunt officiis deserunt molestiae libero aliquid!',
            'aboutus'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur sapiente placeat natus porro et facilis autem adipisci perferendis dolor impedit, voluptas vitae eveniet incidunt officiis deserunt molestiae libero aliquid!',
        ]);
    }
}
