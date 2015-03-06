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
     * Get all data model.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Find model by their id.
     *
     * @param int $id
     * @return Model
     */
    protected function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Update the model by their id.
     *
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update($id, array $data)
    {
        $model = $this->findById($id);
        $model->update($data);

        return $model;
    }

    /**
     * Delete the model by id.
     *
     * @param int $id
     * @return Model
     */
    public function delete($id)
    {
        $model = $this->findById($id);
        $model->delete();

        return $model;
    }

}
