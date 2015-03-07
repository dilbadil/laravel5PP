<?php namespace App\Handlers\Commands\Articles;

use App\Commands\Articles\PublishArticle;
use App\Tag;
use App\Contracts\ArticleRepository;
use App\Contracts\TagRepository;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Guard;

class PublishArticleHandler {

    /**
     * @var Guard
     */
    protected $auth;

    /**
     * @var TagRepository
     */
    protected $tagRepo;

    /**
     * @var ArticleRepository
     */
    protected $articleRepo;

	/**
	 * Create the command handler.
	 *
     * @param Guard $auth
     * @param TagRepository $tagRepo
     * @param ArticleRepository $articleRepo
	 * @return void
	 */
	public function __construct(Guard $auth, TagRepository $tagRepo, ArticleRepository $articleRepo)
	{
		$this->auth = $auth;
		$this->tagRepo = $tagRepo;
        $this->articleRepo = $articleRepo;
	}

	/**
	 * Handle the command.
	 *
	 * @param  PublishArticle  $command
	 * @return \App\Article
	 */
	public function handle(PublishArticle $command)
	{
        $input = $command->input;

        return $this->articleRepo->publish($this->auth->user(), $input);
	}

}
