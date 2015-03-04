<?php namespace App\Handlers\Commands\Articles;

use App\Commands\Articles\CreateArticle;
use App\Tag;
use App\Contracts\TagRepository;

use Illuminate\Queue\InteractsWithQueue;

class CreateArticleHandler {

    /**
     * @var TagRepository
     */
    protected $tagRepo;

	/**
	 * Create the command handler.
	 *
     * @param TagRepository
	 * @return void
	 */
	public function __construct(TagRepository $tagRepo)
	{
		$this->tagRepo = $tagRepo;
	}

	/**
	 * Handle the command.
	 *
	 * @param  CreateArticle  $command
	 * @return array
	 */
	public function handle(CreateArticle $command)
	{
        $tags = $this->tagRepo->getLists();

        return compact('tags');
	}

}
