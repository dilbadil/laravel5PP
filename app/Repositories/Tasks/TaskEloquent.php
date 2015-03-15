<?php namespace App\Repositories\Tasks;

use App\Repositories\EloquentRepository;
use App\Contracts\TaskRepository as TaskRepositoryInterface;
use App\Models\Task;

class TaskEloquent extends EloquentRepository implements TaskRepositoryInterface {

    /**
     * Instance of the repository.
     *
     * @var Task $task
     * @return void
     */
    public function __construct(Task $task)
    {
        parent::__construct($task);

        $this->task = $task;
    }

}
