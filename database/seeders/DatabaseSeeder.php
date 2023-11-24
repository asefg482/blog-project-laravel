<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use Database\Factories\BlogFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\BlogFactory::factory(10)->create();

         \App\Models\User::factory(10)->create()->each(function($user){
             $user->blogs()->saveMany(Blog::factory(rand(1,6))->make());
         });


    }
}
