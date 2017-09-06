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
