<?php

// Pages
Route::get('/', 'ArticlesController@index');
Route::get('home', 'ArticlesController@index');
Route::get('about', [
    'as' => 'about_path',
    'uses' => 'PagesController@about',
]);

// Authentication
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Articles
Route::resource('articles', 'ArticlesController');

// Tags
Route::resource('tags', 'TagsController');

// Profile
Route::resource('profile', 'ProfileController'
    , ['only' => ['index', 'show', 'edit', 'update']]);

// Admin
Route::get('dashboard', 'DashboardController@index');
Route::resource('tasks', 'TasksController');
Route::resource('users', 'UsersController');
