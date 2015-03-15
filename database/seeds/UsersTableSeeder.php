<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\User');

        $faker = Faker::create();
        
        $this->createAdmins();

        for ($i = 0; $i < 10; $i++) 
        {
            $user = new User;
            $user->fullname = $faker->name;
            $user->email = $faker->email;
            $user->username = $faker->userName;
            $user->password = bcrypt('qweasd123');
            $user->save();
            $user->roles()->attach([3]);
        }
    }

    private function createAdmins()
    {
        $user = User::create([
            'fullname' => 'Admin',
            'email' => 'admin@localhost.com',
            'username' => 'admin',
            'password' => bcrypt('qweasd123'),
        ])->roles()->attach([1]);

        $user = User::create([
            'fullname' => 'Super Admin',
            'email' => 'super_admin@localhost.com',
            'username' => 'superAdmin',
            'password' => bcrypt('qweasd123'),
        ])->roles()->attach([1, 2]);
    }

}
