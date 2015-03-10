<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        //
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
        // Registrar
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);

        // UserRepository
        $this->app->bind(
            'App\Contracts\UserRepository',
            'App\Repositories\Users\UserEloquent'
        );

        // ArticleRepository
        $this->app->bind(
            'App\Contracts\ArticleRepository',
            'App\Repositories\Articles\ArticleEloquent'
        );

        // TagRepository
        $this->app->bind(
            'App\Contracts\TagRepository',
            'App\Repositories\Tags\TagEloquent'
        );

        // RoleRepository
        $this->app->bind(
            'App\Contracts\RoleRepository',
            'App\Repositories\Roles\RoleEloquent'
        );
	}

}
