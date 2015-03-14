<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Blade;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

        // bind user
		// $router->model('users', 'App\User');
        
        // bind article
        // $router->bind('articles', function($id)
        // {
        //     return \App\Article::with('user')->published()->findOrFail($id);
        // });

        // bind tags
        // $router->bind('tags', function($name)
        // {
        //     return \App\Tag::where('name', $name)->firstOrFail();
        // });

        // set blade content
        $this->setBladeContent();
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

    /**
     * Set blade content
     *
     * @return void
     */
    private function setBladeContent()
    {
        Blade::setContentTags('{!', '!}');
        // Blade::setEscapedContentTags('<<<', '>>>');
    }

}
