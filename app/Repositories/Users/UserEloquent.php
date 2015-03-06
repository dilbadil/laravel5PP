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
     * Get user by id + their articles.
     *
     * @param int $id
     * @return User
     */
    public function getById($id)
    {
        return $this->model->with('articles')
            ->findOrFail($id);
    }

    /**
     * Get user by id + their articles.
     *
     * @param string $username
     * @return User
     */
    public function getByUsername($username)
    {
        return $this->model->with('articles')
            ->where('username', $username)
            ->firstOrFail();
    }

    /**
     * Store user to database.
     *
     * @param array $user
     * @return User
     */
    public function store(array $user)
    {
        return $this->registrar->create($user);
    }

    /**
     * Update an user to database.
     *
     * @param int $userId
     * @param array $data
     * @return User
     */
    public function update($userId, array $data)
    {
        if (isset($data['password']))
            $data['password'] = bcrypt($data['password']);

        return parent::update($userId, $data);
    }

}
