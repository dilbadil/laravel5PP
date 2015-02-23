<?php

Route::get('/', 'ArticlesController@index');

Route::get('about', 'PagesController@about');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('articles', 'ArticlesController');

Route::get('tags/{tags}', 'TagsController@show');

// Temporary
Route::get('foo', ['middleware' => 'manager', function()
{
    return "this page may be viewed only manager";
}]);
