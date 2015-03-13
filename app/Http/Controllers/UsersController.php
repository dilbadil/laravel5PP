<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Contracts\RoleRepository;

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
     * @param RoleRepository $roleRepo
     * @return void
     */
    public function __construct(RoleRepository $roleRepo)
    {
        $this->middleware('admin');
        $this->roleRepo = $roleRepo;
    }

	/**
	 * Display a listing of the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = $this->dispatch(new ShowAllUser);

        return view('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user.
	 *
     * @param RoleRepository $roleRepo
	 * @return Response
	 */
	public function create()
	{
        $roles = $this->roleRepo->getListsWithPermission();

		return view('users.create', compact('roles'));
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @param UserRequest $request
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
        $user = $this->dispatch(
            new StoreUser($request->all())
        );

        return redirectImportant('users', $user->email . ' has been created');
	}

	/**
	 * Display the specified user.
	 *
	 * @param  string  $username
	 * @return Response
	 */
	public function show($username)
	{
        $data = $this->dispatch(
            new ShowAnUser($username) 
        );

		return view('users.show', $data);
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
	 * @param  UserRequest  $request
	 * @param  int  $userId 
	 * @return Response
	 */
	public function update(UserRequest $request, $userId)
	{
        $user = $this->dispatch(
            new UpdateAnUser($userId, $request->all()) 
        );

        return redirectImportant('users', "User " . $request->input('email') . " has been updated");
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $userId
	 * @return Response
	 */
	public function destroy($userId)
	{
        $user = $this->dispatch(
            new DeleteAnUser($userId) 
        );

        return redirectImportant('users', "User " . $user->email . " has been deleted");
	}

}
