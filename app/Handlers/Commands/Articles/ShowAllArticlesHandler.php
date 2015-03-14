<?php namespace App\Handlers\Commands\Articles;

use App\Commands\Articles\ShowAllArticles;
use App\Contracts\ArticleRepository;

use Illuminate\Queue\InteractsWithQueue;

class ShowAllArticlesHandler {

    /**
     * @var ArticleRepository
     */
    protected $articleRepo;

	/**
	 * Create the command handler.
	 *
     * @param ArticleRepository $articleRepo
	 * @return void
	 */
	public function __construct(ArticleRepository $articleRepo)
	{
		$this->articleRepo = $articleRepo;
	}

	/**
	 * Handle the command.
	 *
	 * @param  ShowAllArticles  $command
	 * @return array
	 */
	public function handle(ShowAllArticles $command)
	{
        $articles = $this->articleRepo->getPublishedPaginated(['user']);

        return compact('articles');
	}

}
