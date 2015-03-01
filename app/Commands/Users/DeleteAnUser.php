<?php namespace App\Commands\Users;

use App\Commands\Command;

class DeleteAnUser extends Command {

    /**
     * @var int
     */
    public $id;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($id)
	{
		$this->id = $id;
	}

}
