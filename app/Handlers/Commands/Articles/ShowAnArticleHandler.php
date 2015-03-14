<?php namespace App\Handlers\Commands\Articles;

use App\Commands\Articles\ShowAnArticle;
use App\Contracts\ArticleRepository;
use App\Contracts\TagRepository;

use Illuminate\Queue\InteractsWithQueue;

class ShowAnArticleHandler {

    /**
     * @var ArticleRepository
     */
    protected $articleRepo;

    /**
     * @var TagRepository
     */
    protected $tagRepo;

	/**
	 * Create the command handler.
	 *
     * @var ArticleRepository $articleRepo
     * @var TagRepository $tagRepo
	 * @return void
	 */
	public function __construct(ArticleRepository $articleRepo, TagRepository $tagRepo)
	{
	    $this->articleRepo = $articleRepo;
	    $this->tagRepo = $tagRepo;
	}

	/**
	 * Handle the command.
	 *
	 * @param  ShowAnArticle  $command
	 * @return void
	 */
	public function handle(ShowAnArticle $command)
	{
        $article = $this->articleRepo->getPublishedBySlug($command->articleSlug);
        $tags = $this->tagRepo->getLists();

        return compact('article', 'tags');
	}

}
