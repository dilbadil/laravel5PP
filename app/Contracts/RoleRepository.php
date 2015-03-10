<?php namespace App\Contracts;

interface RoleRepository {

    /**
     * Get array id name is key value pair from role.
     *
     * @return array
     */
    public function getLists();

}
