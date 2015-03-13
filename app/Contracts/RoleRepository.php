<?php namespace App\Contracts;

interface RoleRepository {

    /**
     * Get all data array id name is key value pair from role.
     *
     * @return array
     */
    public function getAllLists();

    /**
     * Get data from lists. Check the user
     * the not an admin, remove the admin ids from lists.
     *
     * @return array
     */
    public function getListsWithPermission();

}
