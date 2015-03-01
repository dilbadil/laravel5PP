<?php namespace App\Contracts;

interface UserRepository {

    /**
     * Get all users.
     *
     * @return array
     */
    public function getAll();

    /**
     * Store the user.
     *
     * @param array $user
     */
    public function store(array $user);

    /**
     * Get by their id.
     *
     * @param int $id
     * @return array
     */
    public function getById($id);

    /**
     * Update the user.
     *
     * @param array $user
     * @return mixed
     */
    public function update(array $user);
}
