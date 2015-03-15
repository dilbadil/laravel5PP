<?php

use Illuminate\Database\Seeder;

use Laracasts\TestDummy\Factory as TestDummy;
use App\Models\Role;

class RolesTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('Role');

        $lists = [
            'admin',
            'super admin',
            'author'
        ];

        for ($i = 0; $i < 3; $i++) 
        {
            $role = new Role;        
            $role->name = $lists[$i];
            $role->save();
        }
    }

}
