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
	 * @param  UpdateArticle  $command
	 * @return Article 
	 */
	public function handle(UpdateArticle $command)
	{
        $article = $this->articleRepo->update($command->articleId, $command->input);

        return $article;
	}

}
