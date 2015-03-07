<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Auth;
use Illuminate\Auth\Guard;

class LayoutComposer
{

    /**
     * Instance of Composer.
     *
     * @param Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    
    /**
     * Compose views for navigation
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        if ($this->auth->check())
        {
            $view->with(['currentUser' => Auth::user()]);
        }
    }
}
