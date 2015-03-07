<?php namespace App\Repositories\Articles;

use App\Contracts\ArticleRepository as ArticleRepositoryInterface;
use App\Repositories\EloquentRepository;
use App\Article;
use App\User;
use App\Contracts\TagRepository;

class ArticleEloquent extends EloquentRepository implements ArticleRepositoryInterface {

    /**
     * @var Article
     */
    protected $article;

    /**
     * @var TagRepository
     */
    protected $tagRepo;

    /**
     * Instance of Repository.
     *
     * @param Article $article
     * @param TagRepository $tagRepo
     * @return void
     */
    public function __construct(Article $article, TagRepository $tagRepo)
    {
        parent::__construct($article);

        $this->article = $article;
        $this->tagRepo = $tagRepo;
    }

    /**
     * Get all articles that has been published.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPublished()
    {
        return $this->article->with('user')
            ->latest()
            ->published()
            ->get();
    }

    /**
     * Get paginated articles that has been published.
     *
     * @param int $limit
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPublishedPaginated($limit = 6)
    {
        return $this->article->with('user')
            ->latest()
            ->published()
            ->simplePaginate($limit);
    }

    /**
     * Get one published article by their id.
     *
     * @param int $articleId
     * @return Article
     */
    public function getPublishedById($articleId)
    {
        return $this->article->with('user')
            ->published()
            ->findOrFail($articleId);
    }

    /**
     * Get one published article by their slug.
     *
     * @param int $articleSlug
     * @return Article
     */
    public function getPublishedBySlug($articleSlug)
    {
        return $this->article->with('user')
            ->published()
            ->whereSlug($articleSlug)
            ->first();
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
        $article = $this->article->findOrFail($articleId);

        $input['slug'] = $article->generateSlug($input['slug']);

        $article->update($input);

        if (isset($input['tag_list']))
        {
            $tagIds = $this->tagRepo->release($input['tag_list']);
            $article->tags()->sync($tagIds);
        }

        return $article;
    }

    /**
     * Publish a new article with handler the slug.
     *
     * @param User $user
     * @param array $input
     * @return Article
     */
    public function publish(User $user, $input)
    {
        $article = $user->articles()->create($input);
        $article->slug = $article->generateSlug();
        $article->save();

        // Attach tags or create a new if it doesn't exist.
        if (isset($input['tag_list']))
        {
            $tagIds = $this->tagRepo->release($input['tag_list']);
            $article->tags()->attach($tagIds);
        }

        return $article;
    }

}
