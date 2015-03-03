<?php namespace App\Events\Registration;

use App\Events\Event;
use App\User;

use Illuminate\Queue\SerializesModels;

class UserWasRegistered extends Event {

	use SerializesModels;

    /**
     * @var User
     */
    public $user;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

}
