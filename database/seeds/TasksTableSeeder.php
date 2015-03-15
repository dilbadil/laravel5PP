<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use Laracasts\TestDummy\Factory as TestDummy;
use App\Models\User;
use App\Models\Task;

class TasksTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $users = User::all();
        $faker = Faker::create();

        foreach ($users as $user)
        {
            for ($i = 0; $i < rand(1, 5); $i ++)
            {
                $user->tasks()->create([
                    'item' => $faker->sentence(3),
                        'completed' => $faker->randomElement([0, 1])
                    ]);
            }
        }
    }

}
