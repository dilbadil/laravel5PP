<?php namespace App\Handlers\Commands\Users;

use App\Commands\Users\DeleteAnUser;
use App\Contracts\UserRepository;

use Illuminate\Queue\InteractsWithQueue;

class DeleteAnUserHandler {

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
	 * @param  DeleteAnUser  $command
	 * @return \App\User
	 */
	public function handle(DeleteAnUser $command)
	{
		return $this->userRepo->delete($command->userId);
	}

}
