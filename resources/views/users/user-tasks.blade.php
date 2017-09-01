@extends( 'homepage' )

@section( 'content' )
    <table class="table-stripes">
        <tr>
            <th>Task</th>
            <th>Client</th>
            <th class="action-header">Action</th>
        </tr>
        @foreach( $tasks as $task )

                <tr>
                    <td>{{ $task->task_name }}</td>
                    <td>{{ $task->client }}</td>
                    <td class="align-right">
                        <a href="tasks/{{ $task->id }}/edit" class="btn task-button edit-task-button">Edit</a>
                        <form action="tasks/{{ $task->id }}" method="POST" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn task-button remove-task-button">Remove</button>
                        </form>
                    </td>
                </tr>

        @endforeach
    </table>
@endsection
