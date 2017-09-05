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
            <form action="{{ route( 'tasks.update', $task ) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field( 'PUT' ) }}

                <h3 class="title-standout">Edit Task</h3>
                <label for="task_name">Updated Task Name</label><br>
                <input type="text" id="task_name" name="task_name" class="form-control task-input" placeholder="" required><br><br>
                <label for="client">Updated Client Name</label><br>
                <input type="text" id="client" name="client" class="form-control task-input" placeholder="" required><br><br>
                <label for="developers">Updated Developers</label><br>
                <select id="developers" name="developers" class="form-control task-input">
                    <option value="default">Select One</option>
                    @foreach( $developers_list as $developer )
                        <option value="{{ $developer }}">{{ $developer }}</option>
                    @endforeach
                </select><br><br>
                <label for="hours_worked">Updated Hours Worked</label><br>
                <input type="text" id="hours_worked" name="hours_worked" class="form-control task-input" placeholder="" required><br><br>
                <label for="hours_to_build">Updated Hours To Build</label><br>
                <input type="text" id="hours_to_build" name="hours_to_build" class="form-control task-input" placeholder="" required><br><br>

                <button class="btn add-task-button">Update Task Information</button>
            </form>
        </div>

    </div>

@endsection
