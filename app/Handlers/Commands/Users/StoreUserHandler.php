<?php namespace App\Handlers\Commands\Users;

use App\Commands\Users\StoreUser;
use App\Contracts\UserRepository;
use App\Models\Role;
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
        // Role lists handler.
        if (isset($command->user['role_list']) && $this->auth->user()->isNotSuperAdmin())
        {
            $command->user['role_list'] = array_diff($command->user['role_list'], Role::$adminIds);
        }

        return $this->userRepo->add($command->user);
	}

}
