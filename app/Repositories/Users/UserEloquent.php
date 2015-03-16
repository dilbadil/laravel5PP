<?php namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\EloquentRepository;
use App\Contracts\UserRepository as UserRepositoryInterface;
use App\Contracts\RoleRepository;
use App\Services\Registrar;
use Illuminate\Contracts\Auth\Guard;

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
     * @var Guard
     */
    protected $auth;

    /**
     * Instance of Repository.
     *
     * @param User $user
     * @param Registrar $registrar
     * @param Guard $auth
     * @return void
     */
    public function __construct(User $user, Registrar $registrar, RoleRepository $roleRepo, Guard $auth)
    {
        parent::__construct($user);

        $this->registrar = $registrar;
        $this->user = $user;
        $this->roleRepo = $roleRepo;
        $this->auth = $auth;
    }

    /**
     * Get all users with permision.
     *
     * @param array|string $with
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllWithPermision($with = array())
    {
        $users = $this->getAll($with)->filter(function($user)
        {
            if ($user->isSuperAdmin() && $this->auth->user()->isNotSuperAdmin())
            {
                return false;
            }

            return true;
        });

        return $users;
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
