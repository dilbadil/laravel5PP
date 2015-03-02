<?php namespace App\Repositories\Users;

use App\User;
use App\Repositories\EloquentRepository;
use App\Contracts\UserRepository as UserRepositoryInterface;
use App\Services\Registrar;

class UserEloquent extends EloquentRepository implements UserRepositoryInterface {

    /**
     * @var Registrar
     */
    protected $registrar;

    /**
     * @var User
     */
    protected $model;

    /**
     * Instance of Repository.
     *
     * @param User $user
     * @param Registrar $registrar
     * @return void
     */
    public function __construct(User $user, Registrar $registrar)
    {
        $this->registrar = $registrar;
        $this->model = $user;
    }

    /**
     * Get user by id + theri articles.
     *
     * @param int $id
     * @return array
     */
    public function getById($id)
    {
        return $this->model->with('articles')->findOrFail($id)->toArray();
    }

    /**
     * Store user to database.
     *
     * @param array $user
     * @return array
     */
    public function store(array $user)
    {
        return $this->registrar->create($user)->toArray();
    }

    /**
     * Update an user to database.
     *
     * @param array $data
     * @return array
     */
    public function update(array $data)
    {
        $data['password'] = bcrypt($data['password']);

        return parent::update($data);
    }

}
