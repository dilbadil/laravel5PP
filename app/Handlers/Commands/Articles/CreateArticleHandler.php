<?php namespace App\Handlers\Commands\Articles;

use App\Commands\Articles\CreateArticle;
use App\Tag;
use App\Article;
use App\Contracts\TagRepository;

use Illuminate\Queue\InteractsWithQueue;

class CreateArticleHandler {

    /**
     * @var TagRepository
     */
    protected $tagRepo;

    /**
     * @var Article
     */
    protected $article;

	/**
	 * Create the command handler.
	 *
     * @param TagRepository
	 * @return void
	 */
	public function __construct(TagRepository $tagRepo, Article $article)
	{
		$this->tagRepo = $tagRepo;
		$this->article = $article;
	}

	/**
	 * Handle the command.
	 *
	 * @param  CreateArticle  $command
	 * @return array
	 */
	public function handle(CreateArticle $command)
	{
        $tags = $this->tagRepo->getLists();
        $article = $this->article; 

        return compact('tags', 'article');
	}

}
