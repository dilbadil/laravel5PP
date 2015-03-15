<?php namespace App\Services;

use App\Models\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use App\Events\Registration\UserWasRegistered;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, User::$rules);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$user = User::create([
			'fullname' => $data['fullname'],
			'email' => $data['email'],
			'username' => $data['username'],
			'password' => bcrypt($data['password']),
		]);

        if (isset($data['role_list']))
        {
            $user->roles()->attach($data['role_list']);
        }

        // Fire an event that user was registered.
        event(new UserWasRegistered($user));

        return $user;
	}

}
