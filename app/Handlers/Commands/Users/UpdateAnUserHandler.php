<?php namespace App\Handlers\Commands\Users;

use App\Commands\Users\UpdateAnUser;
use App\Contracts\UserRepository;
use App\Models\Role;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Auth\Guard;

class UpdateAnUserHandler {

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
     * @param Guard $auth
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
	 * @param  UdateAnUser  $command
	 * @return \App\User
	 */
	public function handle(UpdateAnUser $command)
	{
        // Role lists handler.
        if (isset($command->data['role_list']) && $this->auth->user()->isNotSuperAdmin())
        {
            $command->data['role_list'] = array_diff($command->data['role_list'], Role::$adminIds);
        }

        return $this->userRepo->update($command->userId, $command->data);
	}

}
