<?php namespace App\Repositories\Tags;

use App\Models\Tag;
use App\Repositories\EloquentRepository;
use App\Contracts\TagRepository as TagRepositoryInterface;

class TagEloquent extends EloquentRepository implements TagRepositoryInterface {

    /**
     * @var Tag
     */
    protected $tag;

    /**
     * Instance of repository.
     *
     * @param Tag $tag
     * @return void
     */
    public function __construct(Tag $tag)
    {
        parent::__construct($tag);

        $this->tag = $tag;
    }

    /**
     * Get list data with key/value id/name like dropdown data.
     *
     * @return array
     */
    public function getLists()
    {
        return $this->tag->lists('name', 'id');
    }

    /**
     * Get paginated articles that has been published by their tag name.
     *
     * @param string $name
     * @param int $limit
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getArticlesByTagName($name, $limit = 4)
    {
       return $this->getBy('name', $name)->articles()->published()->simplePaginate($limit); 
    }

    /**
     * Release ids of input and create one if not exist.
     *
     * @example [1, 2, 'new tag'] -> [1, 2, 3] | 3 is id of new tag
     * @param array $tagsToStore
     * @return array
     */
    public function release(array $tagsToStore)
    {
        $tagIds = $this->tag->lists('id');
        $releaseIds = [];

        foreach ($tagsToStore as $tagToStore)
        {
            if (! in_array($tagToStore, $tagIds))    
                $tagToStore = $this->tag->create(['name' => $tagToStore])->id;

            $releaseIds[] = $tagToStore;
        }

        return $releaseIds;
    }

}
