<?php namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->composeNavigation();
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

    /**
     * Compose the navigation bar
     *
     * @return void 
     */
    private function composeNavigation()
    {
        // view()->composer('partials.navbar', 'App\Http\Composers\NavigationComposer');
        view()->composer('partials.navbar', function($view){
            return $view->with('latest', \App\Article::latest()->first());
        });
    }

}
