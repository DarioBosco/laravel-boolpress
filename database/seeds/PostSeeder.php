<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;
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
            $new_post = new Post();
            $new_post->title = $faker->words(5, true);
            $new_post->content = $faker->realText('800', 2);
            $new_post->author = $faker->name();
            $new_post->slug = Str::kebab($new_post->title);
            $new_post->created_at = now();
            $new_post->updated_at = now();
            $new_post->is_public = 1;
            $new_post->save();
        }
    }
}
