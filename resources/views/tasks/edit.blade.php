@extends( 'homepage' )

@section( 'content' )
    <label for="Project Name">Project Name</label><br>
    <input type="text" placeholder="Enter Project Name" /><br><br>
    <label for="Client Name">Client Name</label><br>
    <input type="text" placeholder="Enter Client Name" />

    <form action="{{ route( 'tasks.update', $task ) }}" method="POST" class="align-right">
        {{ csrf_field() }}
        {{ method_field( 'PUT' ) }}
        <button class="btn edit-task-button">Update Task Information</button>
    </form>

@endsection
