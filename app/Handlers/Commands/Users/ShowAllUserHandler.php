<?php namespace App\Handlers\Commands\Users;

use App\Commands\Users\ShowAllUser;
use App\Contracts\UserRepository;

use Illuminate\Queue\InteractsWithQueue;

class ShowAllUserHandler {

    /**
     * @var ShowAllUser
     */
    protected $command;

    /**
     * @var UserRepository
     */
    protected $userRepo;

	/**
	 * Create the command handler.
	 *
	 * @param UserRepository
	 * @return void
	 */
	public function __construct(UserRepository $userRepo)
	{
		$this->userRepo = $userRepo;
	}

	/**
	 * Handle the command.
	 *
	 * @param  ShowAllUser  $command
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function handle(ShowAllUser $command)
	{
        return $this->userRepo->getAllWithPermision();
	}

}
