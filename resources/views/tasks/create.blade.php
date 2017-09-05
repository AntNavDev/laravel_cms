@extends( 'homepage' )

@section( 'content' )

    <h4>Task Information:</h4>
    <form action={{ route( 'tasks.store' ) }} method="POST">
        {{ csrf_field() }}

        <h3 class="title-standout">Create Task</h3>
        <label for="Task Name">Task Name</label><br>
        <input type="text" id="task_name" name="task_name" class="task-input" placeholder="Enter Task Name" required><br><br>
        <label for="Client Name">Client Name</label><br>
        <input type="text" id="client" name="client" class="task-input" placeholder="Enter Client Name" required><br><br>
        <label for="Developer Name">Developers</label><br>
        <input type="text" id="developers" name="developers" class="task-input" placeholder="Enter Developer Name" required><br><br>
        <label for="Hours Worked">Hours Worked</label><br>
        <input type="text" id="hours_worked" name="hours_worked" class="task-input" placeholder="Enter Hours Worked" required><br><br>
        <label for="Hours To Build">Hours To Build</label><br>
        <input type="text" id="hours_to_build" name="hours_to_build" class="task-input" placeholder="Enter Hours To Build" required><br><br>

        <button class="btn edit-task-button">Create New Task</button>
    </form>

@endsection
