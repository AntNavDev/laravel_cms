@extends( 'layouts/homepage' )

@section( 'content' )



    <h4>Task Information:</h4>
    <form action="{{ route( 'tasks.store' ) }}" method="POST">
        {{ csrf_field() }}

        <h3 class="title-standout">Create Task</h3>
        <label for="task_name">Task Name</label><br>
        <input type="text" id="task_name" name="task_name" class="form-control task-input" placeholder="Enter Task Name"><br><br>
        <label for="client">Client Name</label><br>
        <input type="text" id="client" name="client" class="form-control task-input" placeholder="Enter Client Name"><br><br>
        <label for="developers">Developers</label><br>
        <select id="developers" name="developers" class="form-control task-input">
            <option value="default">Select One</option>
            @foreach( $developers_list as $developer )
                <option value="{{ $developer }}">{{ $developer }}</option>
            @endforeach
        </select><br><br>
        <label for="hours_to_build">Hours To Build</label><br>
        <input type="text" id="hours_to_build" name="hours_to_build" class="form-control task-input" placeholder="Enter Hours To Build"><br><br>

        <button class="btn add-task-button">Create New Task</button>
    </form>

@endsection
