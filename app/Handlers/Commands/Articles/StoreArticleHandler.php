<?php namespace App\Handlers\Commands\Articles;

use App\Commands\Articles\StoreArticle;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Guard;

class StoreArticleHandler {

	/**
	 * Create the command handler.
	 *
     * @param Guard
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle the command.
	 *
	 * @param  StoreArticle  $command
	 * @return \App\Article
	 */
	public function handle(StoreArticle $command)
	{
        $articleCommand = $command->article;

        $article = $this->auth->user()->articles()->create($articleCommand);

        if (isset($articleCommand['tag_list']))
            $article->tags()->attach($articleCommand['tag_list']);

        return $article;    
	}

}
