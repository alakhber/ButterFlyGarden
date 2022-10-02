<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'phone'=>'+994557090184', 
            'email'=>'nakhiyev@gmail.com', 
            'whatsapp'=>'+994557090184', 
            'telegram'=>'+994557090184', 
            'linkedin'=>'https://www.linkedin.com/', 
            'twitter'=>'https://twitter.com/', 
            'instagram'=>'https://www.instagram.com/', 
            'facebook'=>'https://www.facebook.com/',
            'address'=>'Bakı şəhəri Binəqədi Rayonu 6-cı mkr',
        ]);
    }
}
