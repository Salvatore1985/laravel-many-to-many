<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
use App\User;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <100 ; $i++) {
            $newPost= new Post();
            $newPost->title =ucfirst($faker->unique()->word(3,true));
            $newPost->user_id =$faker->numberBetween(1,User::count());
            $newPost->content =$faker->paragraphs(7,true);
            $newPost->image_url ="https://picsum.photos/id/$i/250/400";
            $newPost->slug =Str::slug($newPost->title, '-');
            $newPost->save();

        }
    }
}

