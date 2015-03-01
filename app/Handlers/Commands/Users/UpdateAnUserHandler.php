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
	 * @return array
	 */
	public function handle(UpdateAnUser $command)
	{
        $oldUser = $this->userRepo->getById($command->user['id']);
        $user = $this->userRepo->update($command->user);

        return [
            'user' => $user,
            'old_user' => $oldUser,
        ];
	}

}
