<?php namespace App\Handlers\Commands\Articles;

use App\Commands\Articles\RemoveArticle;
use App\Contracts\ArticleRepository;

use Illuminate\Queue\InteractsWithQueue;

class RemoveArticleHandler {

	/**
	 * Create the command handler.
	 *
     * @var ArticleRepository
	 * @return void
	 */
	public function __construct(ArticleRepository $articleRepo)
	{
		$this->articleRepo = $articleRepo;
	}

	/**
	 * Handle the command.
	 *
	 * @param  RemoveArticle  $command
	 * @return void
	 */
	public function handle(RemoveArticle $command)
	{
		$this->articleRepo->remove($command->articleId);
	}

}
