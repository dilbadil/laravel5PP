<?php namespace App\Commands\Articles;

use App\Commands\Command;

class UpdateArticle extends Command {

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
