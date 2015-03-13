<?php namespace App\Repositories\Users;

use App\User;
use App\Repositories\EloquentRepository;
use App\Contracts\UserRepository as UserRepositoryInterface;
use App\Contracts\RoleRepository;
use App\Services\Registrar;

class UserEloquent extends EloquentRepository implements UserRepositoryInterface {

    /**
     * @var Registrar
     */
    protected $registrar;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var RoleRepository
     */
    protected $roleRepo;

    /**
     * Instance of Repository.
     *
     * @param User $user
     * @param Registrar $registrar
     * @return void
     */
    public function __construct(User $user, Registrar $registrar, RoleRepository $roleRepo)
    {
        parent::__construct($user);

        $this->registrar = $registrar;
        $this->user = $user;
        $this->roleRepo = $roleRepo;
    }

    /**
     * Get user by username.
     *
     * @param string $username
     * @param array|string $with
     * @return User
     */
    public function getByUsername($username, $with = array())
    {
        return $this->make($with)
            ->where('username', $username)
            ->firstOrFail();
    }

    /**
     * Add user to database.
     *
     * @param array $user
     * @return User
     */
    public function add(array $user)
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

        $user = $this->user->findOrFail($userId);
        $user->update($data);

        if (isset($data['role_list']))
        {
            $user->roles()->sync($data['role_list']);
        }

        return $user;
    }

}
