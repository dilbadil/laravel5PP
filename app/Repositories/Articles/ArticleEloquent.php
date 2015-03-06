<?php namespace App\Repositories\Articles;

use App\Contracts\ArticleRepository as ArticleRepositoryInterface;
use App\Repositories\EloquentRepository;
use App\Article;
use App\Tag;

class ArticleEloquent extends EloquentRepository implements ArticleRepositoryInterface {

    /**
     * @var Article
     */
    protected $model;

    /**
     * @var Tag
     */
    protected $tag;

    /**
     * Instance of Repository.
     *
     * @param Article $article
     * @return void
     */
    public function __construct(Article $article, Tag $tag)
    {
        $this->model = $article;
        $this->tag = $tag;
    }

    /**
     * Get all articles that has been published.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPublished()
    {
		return $this->model->with('user')->latest()->published()->get();
    }

    /**
     * Get one published article by their id.
     *
     * @param int $articleId
     * @return Article
     */
    public function getPublishedById($articleId)
    {
        return $this->model->with('user')->published()->findOrFail($articleId);
    }

    /**
     * Get one published article by their slug.
     *
     * @param int $articleSlug
     * @return Article
     */
    public function getPublishedBySlug($articleSlug)
    {
        return $this->model->with('user')->published()->whereSlug($articleSlug)->first();
    }

    /**
     * Update article with the given data.
     *
     * @param int $articleId
     * @param array $input
     * @return Article
     */
    public function update($articleId, array $input)
    {
        $article = $this->model->findOrFail($articleId);
        $article->update($input);

        if (isset($input['tag_list']))
        {
            $tagIds = $this->tag->lists('id');
            $tagIdsToStore = $input['tag_list'];
            $newTags = [];

            foreach ($tagIdsToStore as $tagIdToStore)
            {
                if (! in_array($tagIdToStore, $tagIds))
                {
                    $tagIdToStore = $this->tag->create(['name' => $tagIdToStore])->id;
                }
            
                $newTags[] = $tagIdToStore;
            }

            $article->tags()->sync($newTags);
        }

        return $article;
    }

}
