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
	 * @return void
	 */
	public function handle(ShowAnUser $command)
	{
		$user = $this->userRepo->getByUsername($command->username);

        return compact('user');
	}

}
