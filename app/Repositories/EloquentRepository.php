<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository
{

    /**
     * @var Model
     */
    protected $model;
    
    /**
     * Instance of abstract class.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get instance of Model
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Make eager loader.
     *
     * @param array|string $with
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function make($with = array())
    {
        return $this->model->with($with);
    }

    /**
     * Get all data model with optional eager load.
     *
     * @param array|string $with
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll($with = array())
    {
        return $this->make($with)->get();
    }

    /**
     * Get model by their id.
     *
     * @param int $modelId
     * @param array|string $with
     * @return Model
     */
    public function getById($modelId, $with = array())
    {
        return $this->make($with)->findOrFail($modelId);
    }

    /**
     * Get data by the given key and value.
     *
     * @param string $key
     * @param string $value
     * @param array|string $with
     * @return Model
     */
    public function getBy($key, $value, $with = array())
    {
        return $this->make($with)->where($key, $value)->firstOrFail();
    }

    /**
     * Get data by the given keys and values.
     *
     * @param array $wheres
     * @param array|string $with
     * @return Model
     */
    public function getByMany(array $wheres, $with = array())
    {
        $query = $this->make($with);

        foreach ($wheres as $key => $value)
        {
            $query->where($key, $value);
        }

        return $query->firstOrFail();
    }

    /**
     * Add to database.
     *
     * @param array $data
     * @return Model
     */
    public function add(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update the model by their id.
     *
     * @param int $modelId
     * @param array $data
     * @return Model
     */
    public function update($modelId, array $data)
    {
        $model = $this->getById($modelId);
        $model->update($data);

        return $model;
    }

    /**
     * Delete the model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function remove($modelId)
    {
        $model = $this->getById($modelId);
        $model->delete();

        return $model;
    }

}
