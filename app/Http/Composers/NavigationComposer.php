<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Auth;
use App\Article;

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
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
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

        if (Auth::check())
            $view->with('user', Auth::user());
    }
}
