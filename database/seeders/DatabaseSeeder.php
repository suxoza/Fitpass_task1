<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Facility;
use App\Models\UserCards;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(50)->create()->each(function(User $user){
            $user->cards()->saveMany(UserCards::factory()->count(rand(1, 5))->make());
        });

        Facility::factory()->count(5)->create();
    }
}
