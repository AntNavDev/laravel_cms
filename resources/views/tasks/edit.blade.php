@extends( 'homepage' )

@section( 'content' )

    <div class="row">

        <div class="col-md-6">
            <h3 class="title-standout">Task Information</h3>
            <h4>Task Name</h4><br>
            {{ $task->task_name }}<br><br>
            <h4>Client Name</h4><br>
            {{ $task->client }}<br><br>
            <h4>Developers</h4><br>
            {{ $task->developers }}<br><br>
            <h4>Hours Worked</h4><br>
            {{ $task->hours_worked }}<br><br>
            <h4>Hours To Build</h4><br>
            {{ $task->hours_to_build }}<br><br>

        </div>

        <div class="col-md-6">
            <form action={{ route( 'tasks.update', $task ) }} method="POST" class="align-right">
                {{ csrf_field() }}
                {{ method_field( 'PUT' ) }}

                <h3 class="title-standout">Edit Task</h3>
                <label for="Task Name">Task Name</label><br>
                <input type="text" id="task_name" name="task_name" placeholder="Enter Updated Task Name..." required><br><br>
                <label for="Client Name">Client Name</label><br>
                <input type="text" id="client" name="client" placeholder="Enter Updated Client Name" required><br><br>
                <label for="Developer Name">Developers</label><br>
                <input type="text" id="developers" name="developers" placeholder="Enter Updated Developer Name" required><br><br>
                <label for="Hours Worked">Hours Worked</label><br>
                <input type="text" id="hours_worked" name="hours_worked" placeholder="Enter Hours Worked" required><br><br>
                <label for="Hours To Build">Hours To Build</label><br>
                <input type="text" id="hours_to_build" name="hours_to_build" placeholder="Enter Hours To Build" required><br><br>

                <button class="btn edit-task-button">Update Task Information</button>
            </form>
        </div>

    </div>

@endsection
