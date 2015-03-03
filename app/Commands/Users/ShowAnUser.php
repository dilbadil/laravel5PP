<?php namespace App\Commands\Users;

use App\Commands\Command;

class ShowAnUser extends Command {

    /**
     * @var string
     */
    public $username;

	/**
	 * Create a new command instance.
	 *
	 * @param int $id
	 * @return void
	 */
	public function __construct($username)
	{
		$this->username = $username;
	}

}
