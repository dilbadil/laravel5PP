<?php

use Illuminate\Support\Str;

// User Seed
$factory('App\User', [
    'fullname' => $faker->name,
    'email' => $faker->email,
    'username' => $faker->userName,
    'password' => bcrypt('qweasd123')
]);

// Article seed
$title = $faker->sentence;
$body = $faker->paragraph;
$userIds = App\User::lists('id');
$userId = Illuminate\Support\Collection::make($userIds)->random();

$factory('App\Article', [
    'user_id' => $userId,
    'title' => $title,
    'body' => $body,
    'excerpt' => $body(function($body){
        return Str::limit($body, 128);
    }),
    'slug' => $body(function($body){
        return str_replace(' ', '-', $body);
    })
]);
