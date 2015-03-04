<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Auth;
use App\Article;
use Illuminate\Auth\Guard;

class NavigationComposer
{

    /**
     * @var Article
     */
    protected $article;

    /**
     * Instance of Composer.
     *
     * @param Article $article
     * @param Guard $auth
     * @return void
     */
    public function __construct(Article $article, Guard $auth)
    {
        $this->article = $article;
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
        $view->with('latest', $this->article->latest()->first());

        if ($this->auth->check())
            $view->with('user', Auth::user());
    }
}
