<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;
use App\Jobs\statisticsJob;
use App\Models\Admin;
use App\Models\Statistics;
use App\Models\task;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = task::with("user:id,name")->with("admin:id,name")->latest()->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Cache::remember('users', 24 * 60, function () {
            return  User::pluck("name","id")->toArray();
        });

        $admins = Admin::pluck("name","id")->toArray();

        return view("tasks.create")->with(compact("users","admins"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Task $task, StoretaskRequest $request)
    {

        $task = $task->create($request->all());

        statisticsJob::dispatch($task);

        return redirect()->route('tasks.index')
            ->withSuccess(__('Task created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetaskRequest  $request
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetaskRequest $request, task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->withSuccess(__('Task deleted successfully.'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statistics()
    {
        // method 1 by query
        // $statistics= User::withCount("tasks")->having("tasks_count",">",0)->orderBy('tasks_count', 'desc')->get()->take(10);

        // method 2 by db table
        $statistics=  Statistics::orderBy('tasks_count', 'desc')->get()->take(10);

        return view('tasks.statistics', compact('statistics'));
    }


}
