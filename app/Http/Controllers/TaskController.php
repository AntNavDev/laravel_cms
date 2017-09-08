<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\TaskTime;
use App\User;
use Validator;

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

        $time_entries = TaskTime::all();

        return view( 'tasks/index', compact( 'tasks', 'time_entries' ) );
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
        $validator = Task::validateTask( $request );

        if( $validator->fails() )
        {

            foreach( $validator->getMessageBag()->toArray() as $error_field => $error )
            {
                foreach( $error as $message )
                {
                    $request->session()->flash( 'alert-danger', ( $message ) );
                }
            }

            return redirect()->route( 'tasks.create' )->withErrors( $validator )->withInput();
        }

        $developers = explode( ',', $request[ 'developers' ] );

        $task = Task::create( [
            'task_name' => $request[ 'task_name' ],
            'client' => $request[ 'client' ],
            'developers' => $developers,
            'hours_to_build' => $request[ 'hours_to_build' ],
        ] );
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

        $time_entries = TaskTime::where( 'task_id', '=', $task->id )->get();

        $developers_list = array();

        foreach( $developers as $developer )
        {
            $developers_list[ $developer->getFullName() ] = $developer->getFullName();
        }

        return view( 'tasks/edit', compact( 'task', 'time_entries', 'developers_list' ) );
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
        $validator = Task::validateTask( $request );

        if( $validator->fails() )
        {

            foreach( $validator->getMessageBag()->toArray() as $error_field => $error )
            {
                foreach( $error as $message )
                {
                    $request->session()->flash( 'alert-danger', ( $message ) );
                }
            }

            return redirect()->route( 'tasks.edit', $task )->withErrors( $validator )->withInput();
        }

        $developers = explode( ',', $request[ 'developers' ] );
        $task->fill( [
            'task_name' => $request[ 'task_name' ],
            'client' => $request[ 'client' ],
            'developers' => $developers,
            'hours_to_build' => $request[ 'hours_to_build' ],
        ] );

        $task->save();

        return redirect()->route( 'tasks.edit', $task );
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

        $time_entries = TaskTime::all();

        return view( 'users/user-tasks', compact( 'tasks', 'time_entries' ) );
    }

}
