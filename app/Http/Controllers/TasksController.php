<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
   /* public function __construct() {
        $this->middleware('auth');
    } */
        public function index()
    {
        //$tasks = Task::where(['user_id' => Auth::user()->id])->get();
        $tasks = Task::all();
        return response()->json([
            'tasks'    => $tasks,
        ], 200);
    }
        public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required|max:255',
            'description' => 'required',
            'priority' => 'required'
        ]);
        $task = Task::create([
            'name'        => request('name'),
            'description' => request('description'),
            //'user_id'     => Auth::user()->id,
            'priority' => request('priority')
        ]);
        return response()->json([
            'task'    => $task,
            'message' => 'Success'
        ], 200);
    }
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'name'        => 'required|max:255',
            'description' => 'required',
            'priority' => 'required'
        ]);
        $task->name = request('name');
        $task->description = request('description');
        $task->priority = request('priority');
        $task->save();
        return response()->json([
            'message' => 'Task updated successfully!'
        ], 200);
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return $task;

    }
    public function completeTask(Task $task)
    {
        $task->completed = true;
        $task->save();
        return $task;
    }
    public function completedTask(Task $task)
    {
        $task->completed = false;
        $task->save();
        return $task;
    }
}
