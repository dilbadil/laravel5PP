<?php namespace App\Commands\Users;

use App\Commands\Command;

class UpdateAnUser extends Command {

    /**
     * @var array
     */
    public $data;

    /**
     * @var int
     */
    public $userId;

	/**
	 * Create a new command instance.
	 *
	 * @param array $user
	 * @return void
	 */
	public function __construct($userId, $data)
	{
        $this->userId = $userId;
		$this->data = $data;
	}

}
