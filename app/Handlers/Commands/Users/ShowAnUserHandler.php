<?php namespace App\Handlers\Commands\Users;

use App\Commands\Users\ShowAnUser;
use App\Contracts\UserRepository;
use App\Contracts\RoleRepository;

use Illuminate\Queue\InteractsWithQueue;

class ShowAnUserHandler {

    /**
     * @var UserRepository
     */
    protected $userRepo;

	/**
	 * Create the command handler.
     *
	 * @param UserRepository $userRepo
	 * @param RoleRepository $roleRepo
	 * @return void
	 */
	public function __construct(UserRepository $userRepo, RoleRepository $roleRepo)
	{
		$this->userRepo = $userRepo;
		$this->roleRepo = $roleRepo;
	}

	/**
	 * Handle the command.
	 *
	 * @param  ShowAnUser  $command
	 * @return \App\User
	 */
	public function handle(ShowAnUser $command)
	{
		$user = $this->userRepo->getByUsername($command->username);

        $roles = $this->roleRepo->getListsWithPermission();

        return compact('user', 'roles');
	}

}
