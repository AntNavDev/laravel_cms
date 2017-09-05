@extends( 'homepage' )

@section( 'content' )
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
                    <td><a href={{ route( 'tasks.edit', $task ) }}>{{ $task->task_name }}</a></td>
                    <td>{{ $task->client }}</td>
                    <td>{{ $task->developers }}</td>
                    <td>{{ $task->hours_worked }}</td>
                    <td>{{ $task->hours_to_build }}</td>
                    <td class="align-right">
                        <a href="tasks/{{ $task->id }}/edit" class="btn task-button edit-task-button">Edit</a>
                        <form action="tasks/{{ $task->id }}" method="POST" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn task-button remove-task-button">Remove</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
@endsection
