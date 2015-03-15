<?php namespace App\Repositories\Roles;

use App\Repositories\EloquentRepository;
use App\Contracts\RoleRepository;
use App\Models\Role;
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
     * Get all lists from the roles table.
     *
     * @return array
     */
    public function getAllLists()
    {
        return $this->role->lists('name', 'id');
    }

    /**
     * Get lists array id name key value pair from roles table.
     * if not admin it return except admin ids.
     *
     * @return array
     */
    public function getListsWithPermission()
    {
        $roles = $this->role->lists('name', 'id');
        $adminIds = Role::$adminIds;

        if ($this->auth->user()->isNotSuperAdmin())
        {
            $roles = array_flip(
                array_diff(array_flip($roles), $adminIds)
            );
        }

        return $roles;
    }

}
