<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) {
            $newUser= new User();
            $newUser->name=$faker->userName();
            $newUser->email=$faker->email();
            $newUser->password=Hash::make('classe55'.$i);
            $newUser->save();
        }
    }
}

