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
Route::get('tags/{tags}', 'TagsController@show');

// Admin
Route::get('dashboard', 'DashboardController@index');
Route::get('tasks', 'TasksController@index');
Route::resource('users', 'UsersController');

// Temporary
Route::get('foo', ['middleware' => 'manager', function()
{
    return "this page may be viewed only manager";
}]);
