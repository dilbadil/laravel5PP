<?php namespace App\Contracts;

interface TagRepository {

    /**
     * Get tag lists with key/value is id/name pairs.
     *
     * @return array
     */
    public function getLists();

}
