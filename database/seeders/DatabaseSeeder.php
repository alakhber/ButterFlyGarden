<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ContactSeeder::class,
            // ProductSeeder::class,
            SettingSeeder::class,
            // BlogSeeder::class,
            // PartnerSeeder::class,
            // PartnerSeeder::class,
            // ServiceSeeder::class,
            // ProjectSeeder::class,
            AboutSeeder::class,
            PersonalSeeder::class,
            // SliderSeeder::class,
        ]);
        // \App\Models\Page::factory(20)->create();
        // \App\Models\Subscription::factory(100)->create();
        // \App\Models\Service::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
