<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as F;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = F::create('lt_LT');
        $time = Carbon::now();

        DB::table('users')->insert([
            'name' => 'Skaitytojas',
            'email' => 'skaitytojas@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => $time,
            'updated_at' => $time,
        ]); 
        
        DB::table('users')->insert([
            'name' => 'Administratorius',
            'email' => 'administratorius@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => $time,
            'updated_at' => $time,
        ]);

        foreach(['Action', 'Horror', 'Detective', 'Romance', 'Fairy tales'] as $category){
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time,
            ]);
        }

        foreach(['The Hobbit', 'Dracula', 'The Hound of the Baskervilles', 'Ugly Love', 'Cinderella'] as $book){
            DB::table('books')->insert([
                'title' => $book,
                'description' => $faker->text,
                'pages' => rand(100, 1000),
                'ISBN' => rand(1000000000000,9999999999999),
                'category_id' => rand(1,5),
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time,
            ]);
        }
    }
}
