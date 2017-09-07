@extends( 'layouts/homepage' )

@section( 'content' )

    <div class="row">
        <div class="col-md-6">
            <a href="{{ route( 'tasks.myTasks' ) }}" class="selections selected-area btn">Your Tasks</a>
            <a href="{{ route( 'tasks.index' ) }}" class="selections btn">All Tasks</a>
        </div>

        <div class="col-md-6">
            <a href="{{ route( 'tasks.create' ) }}" class="align-right btn add-task-button">Add Task</a>
        </div>

    </div>

    <div class="row">

        <div class="col-md-12">
            <table class="table-stripes">
                <tr>
                    <th>Task</th>
                    <th>Client</th>
                    <th>Developers</th>
                    <th>Hours Worked</th>
                    <th>Hours To Build</th>
                    <th class="action-header">Action</th>
                </tr>
                @foreach( $tasks as $task )
                    @if( $task->developers === Auth::user()->getFullName() )
                        <tr>
                            <td><a href="{{ route( 'tasks.edit', $task ) }}">{{ $task->task_name }}</a></td>
                            <td>{{ $task->client }}</td>
                            <td>{{ $task->developers }}</td>
                            <?php $time_for_task = $time_entries->where( 'task_id', '=', $task->id ); ?>
                            @if( $time_for_task->sum( 'hours' ) < $task->hours_to_build )
                                <td style="color: #0BAA1E">{{ $time_for_task->sum( 'hours' ) }}</td>
                            @else
                                <td style="color: #FF161D">{{ $time_for_task->sum( 'hours' ) }}</td>
                            @endif
                            <td>{{ $task->hours_to_build }}</td>
                            <td class="align-right">
                                <a href="{{ route( 'tasks.edit', $task ) }}" class="btn task-button edit-task-button">Edit</a>
                                <form action="{{ route( 'tasks.destroy', $task ) }}" method="POST" style="display: inline-block;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn task-button remove-task-button">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>

@endsection
