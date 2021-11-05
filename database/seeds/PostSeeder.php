<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->realText('20', 2),
                'content' => $faker->realText('200', 2),
                'author' => $faker->name(),
                'created_at' => now(),
                'updated_at' => now(),
                'published' => 1
            ]);
        }
    }
}
