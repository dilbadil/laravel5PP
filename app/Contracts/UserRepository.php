<?php namespace App\Contracts;

interface UserRepository {

    /**
     * Get all users.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll();

    /**
     * Store the user.
     *
     * @param array $user
     * @return \App\User
     */
    public function store(array $user);

    /**
     * Get by their id.
     *
     * @param int $id
     * @return \App\User
     */
    public function getById($id);

    /**
     * Get by their username.
     *
     * @param string $username
     * @return \App\User
     */
    public function getByUsername($username);

    /**
     * Update the user.
     *
     * @param int $userId
     * @param array $data
     * @return return \App\User
     */
    public function update($userId, array $user);
}
