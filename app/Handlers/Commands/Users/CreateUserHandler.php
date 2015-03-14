<?php namespace App\Handlers\Commands\Users;

use App\Commands\Users\CreateUser;
use App\Contracts\RoleRepository;
use App\Contracts\UserRepository;

use Illuminate\Queue\InteractsWithQueue;

class CreateUserHandler {

    /**
     * @var UserRepository
     */
    protected $userRepo;

    /**
     * @var RoleRepository
     */
    protected $roleRepo;

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
	 * @param  CreateUser  $command
	 * @return array
	 */
	public function handle(CreateUser $command)
	{
        $user = $this->userRepo->getModel();
        $roles = $this->roleRepo->getListsWithPermission();

        return compact('user', 'roles');
	}

}
