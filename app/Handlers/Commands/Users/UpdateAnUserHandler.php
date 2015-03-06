<?php namespace App\Handlers\Commands\Users;

use App\Commands\Users\UpdateAnUser;
use App\Contracts\UserRepository;

use Illuminate\Queue\InteractsWithQueue;

class UpdateAnUserHandler {

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
	 * @param  UdateAnUser  $command
	 * @return \App\User
	 */
	public function handle(UpdateAnUser $command)
	{
        return $this->userRepo->update($command->userId, $command->data);
	}

}
