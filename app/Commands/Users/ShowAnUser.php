<?php namespace App\Commands\Users;

use App\Commands\Command;

class ShowAnUser extends Command {

    /**
     * @var int
     */
    public $id;

	/**
	 * Create a new command instance.
	 *
	 * @param int $id
	 * @return void
	 */
	public function __construct($id)
	{
		$this->id = $id;
	}

}
