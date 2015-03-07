<?php namespace App\Commands\Articles;

use App\Commands\Command;
use App\Http\Requests\ArticleRequest;

class PublishArticle extends Command {

    /**
     * @var array
     */
    public $input;

	/**
	 * Create a new command instance.
	 *
     * @param array $input
	 * @return void
	 */
	public function __construct(array $input)
	{
		$this->input = $input;
	}

}
