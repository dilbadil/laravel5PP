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
     * @return array
     */
    public function getAll()
    {
        return $this->model->all()->toArray();
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
     * get data model by id.
     *
     * @param int $id
     * @return array
     */
    public function getById($id)
    {
        return $this->findById($id)->toArray();
    }

    /**
     * Update the model.
     *
     * @param array $data
     * @return array
     */
    public function update(array $data)
    {
        $model = $this->findById($data['id']);
        $model->update($data);

        return $model->toArray();
    }

    /**
     * Delete the model by id.
     *
     * @param int $id
     * @return array
     */
    public function delete($id)
    {
        $model = $this->findById($id);
        $model->delete();

        return $model->toArray();
    }

}
