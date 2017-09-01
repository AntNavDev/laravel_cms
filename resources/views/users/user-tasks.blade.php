@extends( 'homepage' )

@section( 'content' )
    @foreach( $tasks as $task )
        {{ $task->client }}
        <br><br>
    @endforeach
@endsection
