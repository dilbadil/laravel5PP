<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class TagsTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $lists = [
            'general',
            'php',
            'javascript',
            'news',
            'laravel',
            'angular',
            'fun',
            'coding'
        ];

        for ($i = 0; $i < 8; $i++) 
        {
            $user = new App\Tag;
            $user->name = $lists[$i];
            $user->save();
        }
    }

}
