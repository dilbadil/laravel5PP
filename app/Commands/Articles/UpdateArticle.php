<?php namespace App\Commands\Articles;

use App\Commands\Command;

class UpdateArticle extends Command {

    /**
     * @var array
     */
    public $input;

    /**
     * @var int
     */
    public $articleId;

	/**
	 * Create a new command instance.
	 *
     * @param int $articleId
     * @param array $article
	 * @return void
	 */
	public function __construct($articleId, array $input)
	{
		$this->articleId = $articleId;
        $this->input = $input;
	}

}
