<?php namespace App\Repositories\Roles;

use App\Repositories\EloquentRepository;
use App\Contracts\RoleRepository;
use App\Role;
use Illuminate\Contracts\Auth\Guard;

class RoleEloquent extends EloquentRepository implements RoleRepository {

    /**
     * @var Role
     */
    protected $role;

    /**
     * Instance of repository.
     *
     * @param Role $role
     * @param Guard $auth
     * @return void
     */
    public function __construct(Role $role, Guard $auth)
    {
        $this->role = $role;
        $this->auth = $auth;

        parent::__construct($role);
    }

    /**
     * Get lists array id name key value pair from roles table.
     *
     * @return array
     */
    public function getLIsts()
    {
        $roles = $this->role->lists('name', 'id');
        $adminIds = Role::$adminIds;

        if (! $this->auth->user()->isSuperAdmin())
        {
            $roles = array_flip(
                array_diff(array_flip($roles), $adminIds)
            );
        }

        return $roles;
    }

}
