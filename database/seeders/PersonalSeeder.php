<?php

namespace Database\Seeders;

use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Personal::create([
            'fullname' => 'Alakhber Nakhiyev',
            'position' => 'Təsisçi Direktor',
            'image'=>'https://images2',
            'facebook'=>'https://facebook.com/Alakhber',
            'linkedin'=>'https://facebook.com/Alakhber',
            'twitter'=>'https://facebook.com/Alakhber',
        ]);
        Personal::create([
            'fullname' => 'Alakhber Nakhiyev',
            'position' => 'Təsisçi Direktor',
            'image'=>'https://images2',
            'facebook'=>'https://facebook.com/Alakhber',
            'linkedin'=>'https://facebook.com/Alakhber',
            'twitter'=>'https://facebook.com/Alakhber',
        ]);
        Personal::create([
            'fullname' => 'Alakhber Nakhiyev',
            'position' => 'Təsisçi Direktor',
            'image'=>'https://images2',
            'facebook'=>'https://facebook.com/Alakhber',
            'linkedin'=>'https://facebook.com/Alakhber',
            'twitter'=>'https://facebook.com/Alakhber',
        ]);
    }
}
