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

        if( isset( $request[ 'hours_increase' ] ) )
        {
            $validator = Validator::make( $request->all(), [
                'hours_increase' => 'numeric|min:0.1'
            ] );

            if( $validator->fails() )
            {
                $request->session()->flash( 'alert-danger', 'Additional hours must be numeric and greater than 0.' );
                return redirect()->route( 'tasks.edit', $task )->withErrors( $validator )->withInput();
            }
            else
            {
                $task->hours_worked += $request[ 'hours_increase' ];
            }

        }
        else
        {
            $validator = Validator::make( $request->all(), [
                'task_name' => 'required',
                'client' => 'required',
                'developers' => 'required',
                'hours_to_build' => 'required'
            ] );

            if( $validator->fails() )
            {
                $request->session()->flash( 'alert-danger', 'All \'Edit Task\' fields must be filled out in order to update this task.' );
                return redirect()->route( 'tasks.edit', $task )->withErrors( $validator )->withInput();
            }

            $developers = explode( ',', $request[ 'developers' ] );
            $task->fill( [
                'task_name' => $request[ 'task_name' ],
                'client' => $request[ 'client' ],
                'developers' => $developers,
                'hours_to_build' => $request[ 'hours_to_build' ],
            ] );
        }
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
