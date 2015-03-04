<?php namespace App\Repositories\Articles;

use App\Contracts\ArticleRepository as ArticleRepositoryInterface;
use App\Repositories\EloquentRepository;
use App\Article;

class ArticleEloquent extends EloquentRepository implements ArticleRepositoryInterface {

    /**
     * @var Article
     */
    protected $article;

    /**
     * Instance of Repository.
     *
     * @param Article $article
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get all articles that has been published.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPublished()
    {
		return $this->article->with('user')->latest('published_at')->published()->get();
    }

}
