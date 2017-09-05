<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with( 'user' )->get();
        return view( 'tasks/index', compact( 'tasks' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $developers = User::all();
        $developers_list = array();

        foreach( $developers as $developer )
        {
            $developers_list[ $developer->getFullName() ] = $developer->getFullName();
        }

        return view( 'tasks/create', compact( 'developers_list' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::create( $request->toArray() );
        $task->save();

        return redirect()->route( 'tasks.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task = Task::find( $task->id );

        $developers = User::all();
        $developers_list = array();

        foreach( $developers as $developer )
        {
            $developers_list[ $developer->getFullName() ] = $developer->getFullName();
        }

        return view( 'tasks/edit', compact( 'task', 'developers_list' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task->fill( $request->toArray() );
        $task->save();

        return redirect()->route( 'tasks.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task = Task::find( $task->id );
        $task->delete();

        return redirect()->route( 'tasks.index' );
    }

    public function myTasks()
    {
        $tasks = Task::with( 'user' )->get();
        return view( 'users/user-tasks', compact( 'tasks' ) );
    }

    public function increaseHoursWorked( Request $request )
    {
        dd( $request->toArray() );
    }
}
