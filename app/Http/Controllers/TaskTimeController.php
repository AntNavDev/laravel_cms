<?php

namespace App\Http\Controllers;

use App\Task;
use App\TaskTime;
use App\User;
use Validator;
use Illuminate\Http\Request;

class TaskTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::find( $request->input( 'task_id' ) );

        $validator = Validator::make( $request->all(), [
            'task_id' => 'required',
            'developer' => 'required',
            'description' => 'required',
            'hours' => 'required|numeric|min:0.1'
        ] );

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

        $task_time = TaskTime::create( $request->toArray() );

        $task_time->save();

        $developers = User::all();

        $time_entries = TaskTime::where( 'task_id', '=', $task->id )->get();

        $developers_list = array();

        foreach( $developers as $developer )
        {
            $developers_list[ $developer->getFullName() ] = $developer->getFullName();
        }

        return redirect()->route( 'tasks.edit', $task );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $time_entry = TaskTime::find( $id );

        $time_entry->delete();

        return redirect()->back();

    }

}
