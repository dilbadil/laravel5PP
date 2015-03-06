<?php namespace App\Handlers\Commands\Articles;

use App\Commands\Articles\UpdateArticle;
use App\Contracts\ArticleRepository;
use App\Article;

use Illuminate\Queue\InteractsWithQueue;

class UpdateArticleHandler {

    /**
     * @var ArticleRepository
     */
    protected $articleRepo;

    /**
     * @var Article
     */
    protected $article;

	/**
	 * Create the command handler.
	 *
     * @param ArticleRepository $articleRepo
	 * @return void
	 */
	public function __construct(ArticleRepository $articleRepo, Article $article)
	{
		$this->articleRepo = $articleRepo;
        $this->article = $article;
	}

	/**
	 * Handle the command.
	 *
	 * @param  UpdateArticle  $command
	 * @return void
	 */
	public function handle(UpdateArticle $command)
	{
        $articleCommand = $command->article;

        $article = $this->articleRepo->update($articleCommand);

        return $article;
	}

}
