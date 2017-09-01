@extends( 'homepage' )

@section( 'content' )

    <input type="text" placeholder="Enter Project Name" /><br><br>
    <input type="text" placeholder="Enter Client Name" />

    <form action="{{ route( 'tasks.update', $task ) }}" method="POST" class="align-right">
        {{ csrf_field() }}
        {{ method_field( 'PUT' ) }}
        <button class="btn edit-task-button">Update Task Information</button>
    </form>

@endsection
