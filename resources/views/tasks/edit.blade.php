@extends( 'homepage' )

@section( 'content' )

    <form action={{ route( 'tasks.update', $task ) }} method="POST" class="align-right">
        {{ csrf_field() }}
        {{ method_field( 'PUT' ) }}

        <label for="Project Name">Task Name</label><br>
        <input type="text" id="task_name" name="task_name" placeholder="Enter Updated Task Name..." required><br><br>
        <label for="Client Name">Client Name</label><br>
        <input type="text" id="client" name="client" placeholder="Enter Updated Client Name" required>

        <button class="btn edit-task-button">Update Task Information</button>
    </form>

@endsection
