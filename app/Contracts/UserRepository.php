<?php namespace App\Contracts;

interface UserRepository {

    /**
     * Get all users.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll();

    /**
     * Add an user.
     *
     * @param array $user
     * @return \App\User
     */
    public function add(array $user);

    /**
     * Get user by their id.
     *
     * @param int $id
     * @return \App\User
     */
    public function getById($id);

    /**
     * Get user by their username.
     *
     * @param string $username
     * @return \App\User
     */
    public function getByUsername($username);

    /**
     * Update the user.
     *
     * @param int $userId
     * @param array $user
     * @return return \App\User
     */
    public function update($userId, array $user);

    /**
     * Remove an user by their id.
     *
     * @param int $modelId
     * @return \App\User
     */
    public function remove($modelId);

}
