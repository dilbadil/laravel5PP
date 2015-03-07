<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->composeLayout();
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
        view()->composer('partials.navbar', 'App\Http\Composers\NavigationComposer');
    }

    /**
     * Compose the layout.
     *
     * @return void
     */
    private function composeLayout()
    {
        view()->composer('*', 'App\Http\Composers\LayoutComposer');
    }

}
