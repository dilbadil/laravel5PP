<?php namespace App\Commands\Articles;

use App\Commands\Command;

class RemoveArticle extends Command {

    /**
     * @var int
     */
    public $articleId;

	/**
	 * Create a new command instance.
	 *
     * @var int $articleId
	 * @return void
	 */
	public function __construct($articleId)
	{
		$this->articleId = $articleId;
	}

}
