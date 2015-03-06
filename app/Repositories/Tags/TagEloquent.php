<?php namespace App\Repositories\Tags;

use App\Tag;
use App\Repositories\EloquentRepository;
use App\Contracts\TagRepository as TagRepositoryInterface;

class TagEloquent extends EloquentRepository implements TagRepositoryInterface {

    /**
     * @var Tag
     */
    protected $model;

    /**
     * Instance of repository.
     *
     * @param Tag $tag
     * @return void
     */
    public function __construct(Tag $tag)
    {
        $this->model = $tag;
    }

    /**
     * Get list data with key/value id/name like dropdown data.
     *
     * @return array
     */
    public function getLists()
    {
        return $this->model->lists('name', 'id');
    }

}
