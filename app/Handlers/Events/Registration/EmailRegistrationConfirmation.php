<?php namespace App\Handlers\Events\Registration;

use App\Events\Registration\UserWasRegistered;
use App\Contracts\UserRepository;
use App\Models\Log;
use Mail;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EmailRegistrationConfirmation {

    /**
     * @var Log
     */
    protected $log;

	/**
	 * Create the event handler.
	 *
     * @param Log $log
	 * @return void
	 */
	public function __construct(Log $log)
	{
		$this->log = $log;
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserWasRegisterd  $event
	 * @return void
	 */
	public function handle(UserWasRegistered $event)
	{
        $user = $event->user;

        // Save to log.
        $this->log->create([
            'name' => "registration.email.user",
            'description' => $user->toJson(),
        ]);

        // Send email registration to user.
        Mail::send('emails.welcome', compact('user'), function($message) use ($user)
        {
            $message->subject('Welcome to Dilbadil Inc');
            $message->from('admin@dilbadil.com', 'Dilbadil Inc');
            $message->to($user->email);
        });
	}

}
