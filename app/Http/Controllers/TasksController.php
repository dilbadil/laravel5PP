<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\Contracts\TaskRepository;
use App\Http\Requests\TaskRequest;

use Illuminate\Http\Request;

class TasksController extends Controller {

    /**
     * @var TaskRepository
     */
    protected $taskRepo;

    /**
     * Instance of the controller.
     *
     * @param TaskRepository $taskRepo
     * @return void
     */
    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

	/**
	 * Display a listing of the task.
	 *
	 * @return Response
	 */
	public function index()
	{
        return $this->taskRepo->getAll(); 
	}

	/**
	 * Store a newly created task in storage.
	 *
     * @param TaskRequest $request
	 * @return Response
	 */
	public function store(TaskRequest $request)
	{
		$store = $this->taskRepo->add($request->all());

        if ($store) return ['status' => true];

        return ['status' => false];
	}

	/**
	 * Display the specified task.
	 *
	 * @param  int  $taskId
	 * @return Response
	 */
	public function show($taskId)
	{
		return $this->taskRepo->getById($taskId);
	}

	/**
	 * Update the specified task in storage.
	 *
	 * @param  int  $taskId
     * @param TaskRequest $request
	 * @return Response
	 */
	public function update($taskId, TaskRequest $request)
	{
		if ($this->taskRepo->update($taskId, $request->all()))
        {
            return ['status' => true];
        }

        return ['status' => false];
	}

	/**
	 * Remove the specified task from storage.
	 *
	 * @param  int  $taskId
	 * @return Response
	 */
	public function destroy($taskId)
	{
		if ($this->taskRepo->remove($taskId))
        {
            return ['status' => true];
        }

        return ['status' => false];
	}

}
