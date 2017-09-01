@extends( 'homepage' )

@section( 'content' )
    <table class="table-stripes">
        <tr>
            <h3><th>Task</th></h3>
            <h3><th>Client</th></h3>
        </tr>
        @foreach( $tasks as $task )
            <form action="tasks/{{ $task->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <tr>
                    <td>{{ $task->task_name }}</td>
                    <td>{{ $task->client }}</td>
                    <td><button class="btn remove-task-button align-right">Remove</button></td>
                </tr>
            </form>
        @endforeach
    </table>
@endsection
