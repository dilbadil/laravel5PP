<?php namespace App\Commands\Users;

use App\Commands\Command;

class StoreUser extends Command {

    /**
     * @var array
     */
    public $user;

	/**
	 * Create a new command instance.
	 *
	 * @param array $user
	 * @return void
	 */
	public function __construct(array $user)
	{
		$this->user = $user;
	}

}
