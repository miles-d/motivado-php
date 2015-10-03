<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Crypt;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\Http\Requests\CreateTaskRequest;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Date is needed in view to suggest due date
		$today = new \DateTime;

        // get user's tasks (does not include completed tasks)
        $tasks = Task::getTasks(Auth::user()->id);

        foreach($tasks as $task) {
            $task['dateString'] = \Carbon\Carbon::createFromFormat('Y-m-d', $task->due_date)->diffForHumans(null, true);
            // special case
            if ($task['dateString'] === '1 second') {
                $task['dateString'] = 'today';
            } elseif ($task->isPending()) {
                $task['dateString'] .= ' ago';
            } else {
                $task['dateString'] = 'in ' . $task['dateString'];
            }
        }

        // get completed tasks
		$doneTasks = Task::getDoneTasks(Auth::user()->id);
		
		$user = Auth::user();

		return view('tasks.home', compact('tasks','doneTasks', 'today', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTaskRequest  $request
     * @return Response
     */
    public function store(CreateTaskRequest $request, Task $task)
    {
        // validate date only if supplied ('sometimes')
        $this->validate($request, [
            'due_date' => 'sometimes|date_format:Y-m-d',
        ]);

        // if no date supplied, default to today
        if (empty($request->due_date)) {
            $today = \Carbon\Carbon::today();
            $input['due_date'] = $today->toDateString();
        } else {
            $input['due_date'] = $request->due_date;
        }

		$input['_token'] = $request->_token;
		$input['description'] = Crypt::encrypt($request->description);
		$input['motivation'] = Crypt::encrypt($request->motivation);
		$input['user_id'] = Auth::user()->id;
		$input['completed'] = 0;
		
		$task->create($input);

		return redirect()->route('tasks.index')->with('message', 'Task added!')->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Task $task)
    {
		return $task;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Task $task)
    {
		if ($task->user_id == Auth::user()->id && $task->completed === '0') {
			$task['description'] = Crypt::decrypt($task['description']);
			$task['motivation'] = Crypt::decrypt($task['motivation']);
			$user = Auth::user();
			return view('tasks.edit', compact('task', 'user'));
		} else {
            return redirect('/')
                ->with('message', 'Oops, something went wrong!')
                ->with('status', 'danger');
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Task $task)
    {
		if (isset($request['completed'])) {
			$input['completed'] = $request['completed'];
		} else {
            $this->validate($request, [
                'due_date' => 'sometimes|date_format:Y-m-d',
            ]);

            // if no date supplied, default to today
            if (empty($request->due_date)) {
                $today = \Carbon\Carbon::today();
                $input['due_date'] = $today->toDateString();
            } else {
                $input['due_date'] = $request->due_date;
            }

			$input['_token'] = $request->_token;
			$input['description'] = Crypt::encrypt($request->description);
			$input['motivation'] = Crypt::encrypt($request->motivation);
		}
			
		$task->fill($input)->save();
		return redirect()->route('tasks.index')->with('message', 'Task saved!')->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Task $task)
    {
		$task->delete();

		return redirect()->route('tasks.index')->with('message', 'Task deleted!')->with('status', 'success');
    }

    public function destroyDone()
    {
        Task::destroyDone(Auth::user()->id);

        return redirect()->route('tasks.index')
            ->with('message', 'Completed tasks deleted.')
            ->with('status', 'success');
    }
}

