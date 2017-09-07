<div class="row">

    <div class="col-md-12">
        <table class="table-stripes">
            <tr>
                <th><h4>Developer</h4></th>
                <th><h4>Description of Work</h4></th>
                <th><h4>Applied Hours</h4></th>
            </tr>
            @foreach( $time_entries as $time_entry )
                <tr>
                    <td>{{ $time_entry->developer }}</td>
                    <td>{{ $time_entry->description }}</td>
                    <td>{{ $time_entry->hours }}</td>
                    {{-- <td class="align-right">
                        <a href="{{ route( 'tasks.edit', $task ) }}" class="btn task-button edit-task-button">Edit</a>
                        <form action="{{ route( 'tasks.destroy', $task ) }}" method="POST" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn task-button remove-task-button">Remove</button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </table>
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
