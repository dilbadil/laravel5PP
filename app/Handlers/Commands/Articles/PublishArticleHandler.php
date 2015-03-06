<?php namespace App\Handlers\Commands\Articles;

use App\Commands\Articles\PublishArticle;
use App\Tag;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Guard;

class PublishArticleHandler {

    /**
     * @var Guard
     */
    protected $auth;

    /**
     * @var Tag
     */
    protected $tag;

	/**
	 * Create the command handler.
	 *
     * @param Guard $auth
     * @param Tag $tag
	 * @return void
	 */
	public function __construct(Guard $auth, Tag $tag)
	{
		$this->auth = $auth;
		$this->tag = $tag;
	}

	/**
	 * Handle the command.
	 *
	 * @param  PublishArticle  $command
	 * @return \App\Article
	 */
	public function handle(PublishArticle $command)
	{
        $articleCommand = $command->article;

        $article = $this->auth->user()->articles()->create($articleCommand);

        if (isset($articleCommand['tag_list']))
        {
            $tagsToStore = $articleCommand['tag_list'];
            $tagIds = $this->tag->lists('id');

            foreach ($tagsToStore as $tagToStore)
            {
                if (! in_array($tagToStore, $tagIds))    
                    $tagToStore = $this->tag->create(['name' => $tagToStore])->id;

                $article->tags()->attach($tagToStore);
            }
        }

        return $article;    
	}

}
