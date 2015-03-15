<?php

use Illuminate\Database\Seeder;

use Laracasts\TestDummy\Factory as TestDummy;

class RolesTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $lists = [
            'admin',
            'super admin',
            'author'
        ];

        for ($i = 0; $i < 3; $i++) 
        {
            $role = new App\Role;        
            $role->name = $lists[$i];
            $role->save();
        }
    }

}
