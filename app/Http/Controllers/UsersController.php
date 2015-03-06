<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

use App\Commands\Users\ShowAllUser;
use App\Commands\Users\ShowAnUser;
use App\Commands\Users\StoreUser;
use App\Commands\Users\UpdateAnUser;
use App\Commands\Users\DeleteAnUser;

use Illuminate\Http\Request;

class UsersController extends Controller {

    /**
     * Instance of controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

	/**
	 * Display a listing of the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $result = $this->dispatch(new ShowAllUser);

        return view('users.index', $result);
	}

	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('users.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @param UserRequest $request
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
        $result = $this->dispatch(
            new StoreUser($request->all())
        );

        return redirectImportant('users', $result['user']['email'] . ' has been created');
	}

	/**
	 * Display the specified user.
	 *
	 * @param  string  $username
	 * @return Response
	 */
	public function show($username)
	{
        $result = $this->dispatch(
            new ShowAnUser($username) 
        );

		return view('users.show', $result);
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  string  $username
	 * @return Response
	 */
	public function edit($username)
	{
        $data = $this->dispatch(
            new ShowAnUser($username)
        );

		return view('users.edit', $data);
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @param  UserRequest  $request
	 * @return Response
	 */
	public function update(UserRequest $request, $id)
	{
        $data = array_add($request->all(), 'id', $id);

        $result = $this->dispatch(
            new UpdateAnUser($data) 
        );

        return redirectImportant('users', "User " . $result['old_user']['email'] . " has been updated to " . $result['user']['email']);
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $result = $this->dispatch(
            new DeleteAnUser($id) 
        );

        return redirectImportant('users', "User " . $result['user']['email'] . " has been deleted");
	}

}
