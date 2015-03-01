<?php namespace App\Handlers\Commands\Users;

use App\Commands\Users\StoreUser;
use App\Contracts\UserRepository;

use Illuminate\Queue\InteractsWithQueue;

class StoreUserHandler {

    /**
     * @var UserRepository
     */
    protected $userRepo;

	/**
	 * Create the command handler.
	 *
	 * @param UserRepository $userRepo
	 * @return void
	 */
	public function __construct(UserRepository $userRepo)
	{
		$this->userRepo = $userRepo;
	}

	/**
	 * Handle the command.
	 *
	 * @param  StoreUser  $command
	 * @return array
	 */
	public function handle(StoreUser $command)
	{
        $user = $this->userRepo->store($command->user);

        return compact('user');
	}

}