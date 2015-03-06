<?php namespace App\Commands\Articles;

use App\Commands\Command;
use App\Http\Requests\ArticleRequest;

class PublishArticle extends Command {

    /**
     * @var array
     */
    public $article;

	/**
	 * Create a new command instance.
	 *
     * @param array $article
	 * @return void
	 */
	public function __construct(array $article)
	{
		$this->article = $article;
	}

}
