<?php namespace App\Commands\Users;

use App\Commands\Command;

class DeleteAnUser extends Command {

    /**
     * @var int
     */
    public $userId;

	/**
	 * Create a new command instance.
	 *
     * @param int $userId
	 * @return void
	 */
	public function __construct($userId)
	{
		$this->userId = $userId;
	}

}
