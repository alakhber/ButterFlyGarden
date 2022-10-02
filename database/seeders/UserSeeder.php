<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullname'=>'Alakhber Nakhiyev',
            'username'=>'nakhiyev',
            'email'=>'nakhiyev.alakhber@gmail.com',
            'phone'=>'+994557090184',
            'password'=>Hash::make('nakhiyev'),
            'type'=>'Super-Admin',
        ]);
        // for ($i=0; $i <50 ; $i++) { 
        //     User::create([
        //         'fullname'=>'İstifadəçi '.$i,
        //         'username'=>'username'.$i,
        //         'email'=>'username'.$i.'@gmail.com',
        //         'phone'=>'+994557090184',
        //         'password'=>Hash::make('username'.$i),
        //     ]); 
        // }
    }
}
