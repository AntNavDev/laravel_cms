@extends( 'layouts/homepage' )

@section( 'content' )

    <script type="text/javascript" src="{{ URL::asset( 'js/developers-selection.js' ) }}"></script>

    <div class="row">

        <div class="col-md-2">
            <h3 class="title-standout">Task Information</h3>
            <h4>Task Name</h4><br>
            {{ $task->task_name }}<br><br>
            <h4>Client Name</h4><br>
            {{ $task->client }}<br><br>
            <h4>Developers</h4><br>
            @foreach( $task->developers as $developer )
                {{ $developer }}<br>
            @endforeach
            <br><br>
            <h4>Hours Worked</h4><br>
            {{ $time_entries->sum( 'hours' ) }}<br><br>
            <h4>Hours To Build</h4><br>
            {{ $task->hours_to_build }}<br><br>

        </div>

        <div class="col-md-7">

            <div class="row">
                <div class="col-md-12">
                    @include( 'tasks/time-added' )
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3>Enter Task Details</h3>
                    <form action="{{ route( 'task_time.store', $task ) }}" method="POST">
                        {{ csrf_field() }}

                        <input type="hidden" id="task_id" name="task_id" value="{{ $task->id }}">

                        <label for="developer">Developer</label>
                        <select id="developer" name="developer" class="form-control task-input">
                            <option value="default">Select One</option>
                            @foreach( $developers_list as $developer )
                                <option value="{{ $developer }}">{{ $developer }}</option>
                            @endforeach
                        </select>
                        <label for="description">Description of Work</label>
                        <input type="text" id="description" name="description" class="form-control task-input" placeholder="" required>
                        <label for="hours">Hours to Add</label>
                        <input type="text" id="hours" name="hours" class="form-control task-input" placeholder="" required>

                        <br><br>
                        <button class="btn add-task-button">Update Time Logged</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-md-3">
            <form action="{{ route( 'tasks.update', $task ) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field( 'PUT' ) }}

                <h3 class="title-standout">Edit Task</h3>
                <label for="task_name">Updated Task Name</label><br>
                <input type="text" id="task_name" name="task_name" class="form-control task-input" placeholder=""><br><br>
                <label for="client">Updated Client Name</label><br>
                <input type="text" id="client" name="client" class="form-control task-input" placeholder=""><br><br>
               <label for="developers_list">Update Developers</label><br>
                <select id="developers_list" name="developers_list" class="form-control task-input">
                    <option value="default">Select One</option>
                    @foreach( $developers_list as $developer )
                        <option value="{{ $developer }}">{{ $developer }}</option>
                    @endforeach
                </select><br><br>
                <label for="selected_developers">Selected Developers</label><br>
                <div id="selected_developers" name="selected_developers"></div>
                <input id="developers" name="developers" class="task-input" hidden><br>
                <label for="hours_to_build">Updated Hours To Build</label><br>
                <input type="text" id="hours_to_build" name="hours_to_build" class="form-control task-input" placeholder=""><br><br>

                <button class="btn add-task-button">Update Task Information</button>
            </form>
        </div>

    </div>

@endsection
