<?php namespace App\Commands\Articles;

use App\Commands\Command;

class ShowAnArticle extends Command {

    /**
     * @var string
     */
    public $articleSlug;

	/**
	 * Create a new command instance.
	 *
     * @param string $articleSlug
	 * @return void
	 */
	public function __construct($articleSlug)
	{
		$this->articleSlug = $articleSlug;
	}

}
