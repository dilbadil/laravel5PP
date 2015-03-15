<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

use App\Commands\Users\ShowAnUser;
use App\Commands\Users\UpdateAnUser;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class ProfileController extends Controller {

    /**
     * @var Guard
     */
    protected $auth;

    /**
     * Instance of controller.
     *
     * @param Guard $aut
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth', ['except' => 'show']);
        $this->middleware('owner.profile', ['only' => 'edit', 'update']);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $user = $this->auth->user();

		return view('profile.index', compact('user'));
	}

    /**
     * Display detail of the profile.
     *
     * @param string $username
     * @return Response
     */
    public function show($username)
    {
        $data = $this->dispatch(
            new ShowAnUser($username) 
        );

        return view('profile.index', $data);
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  string  $username
	 * @return Response
	 */
	public function edit($username)
	{
        $data = $this->dispatch(
            new ShowAnUser($username) 
        );

		return view('profile.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
     * @param UserRequest $request
	 * @param  int  $userId
	 * @return Response
	 */
	public function update(UserRequest $request, $userId)
	{
        $user = $this->dispatch(
            new UpdateAnUser($userId, $request->all()) 
        );

        return redirectImportant('profile', "Your profile has been deleted");
	}

}
