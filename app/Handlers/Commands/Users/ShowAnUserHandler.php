<?php namespace App\Handlers\Commands\Users;

use App\Commands\Users\ShowAnUser;
use App\Contracts\UserRepository;

use Illuminate\Queue\InteractsWithQueue;

class ShowAnUserHandler {

    /**
     * @var UserRepository
     */
    protected $userRepo;

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct(UserRepository $userRepo)
	{
		$this->userRepo = $userRepo;
	}

	/**
	 * Handle the command.
	 *
	 * @param  ShowAnUser  $command
	 * @return \App\User
	 */
	public function handle(ShowAnUser $command)
	{
		return $this->userRepo->getByUsername($command->username);
	}

}
