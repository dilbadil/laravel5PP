<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;

use Illuminate\Http\Request;

class TasksController extends Controller {

    /**
     * @var Task
     */
    protected $task;

    /**
     * Instance TaskController.
     *
     * @param Task $task
     * @return Response
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

	/**
	 * Display a listing of the task.
	 *
	 * @return Response
	 */
	public function index()
	{
        return $this->task->all(); 
	}

	/**
	 * Show the form for creating a new task.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created task in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified task.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified task.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified task in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified task from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
