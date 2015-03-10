<?php namespace App\Handlers\Commands\Users;

use App\Commands\Users\StoreUser;
use App\Contracts\UserRepository;
use App\User;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Queue\InteractsWithQueue;

class StoreUserHandler {

    /**
     * @var UserRepository
     */
    protected $userRepo;

    /**
     * @var Guard
     */
    protected $auth;

	/**
	 * Create the command handler.
	 *
	 * @param UserRepository $userRepo
	 * @return void
	 */
	public function __construct(UserRepository $userRepo, Guard $auth)
	{
		$this->userRepo = $userRepo;
        $this->auth = $auth;
	}

	/**
	 * Handle the command.
	 *
	 * @param  StoreUser  $command
	 * @return \App\User
	 */
	public function handle(StoreUser $command)
	{
        $adminIds = User::$adminIds;

        if (isset($command->user['role_list']) && ! $this->auth->user()->isSuperAdmin())
        {
            $command->user['role_list'] = array_diff($command->user['role_list'], $adminIds);
        }

        return $this->userRepo->store($command->user);
	}

}
