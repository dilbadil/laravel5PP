<?php namespace App\Handlers\Commands\Articles;

use App\Commands\Articles\CreateArticle;
use App\Contracts\TagRepository;
use App\Contracts\ArticleRepository;

use Illuminate\Queue\InteractsWithQueue;

class CreateArticleHandler {

    /**
     * @var TagRepository
     */
    protected $tagRepo;

    /**
     * @var ArticleRepository
     */
    protected $articleRepo;

	/**
	 * Create the command handler.
	 *
     * @param TagRepository
	 * @return void
	 */
	public function __construct(TagRepository $tagRepo, ArticleRepository $articleRepo)
	{
		$this->tagRepo = $tagRepo;
		$this->articleRepo = $articleRepo;
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
        $article = $this->articleRepo->getModel(); 

        return compact('tags', 'article');
	}

}
