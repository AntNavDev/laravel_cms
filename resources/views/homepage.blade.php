<!doctype html>
<html lang="{{ app()->getLocale() }}">

<!-- jQuery -->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous">
</script>

<!-- Bootstrap -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<head>
    <title>{{ config( 'app.name' ) }}</title>
</head>

<body>
    <div id="profile-bar" class="col-md-12">
        @if( ! Auth::check() )
            <a href="{{ route( 'auth.login' ) }}" class="login-button align-right btn">Login</a>
        @else
            <p class="align-right">Welcome, {{ Auth::user()->getName() }}</p>
            <a href="{{ route( 'logout' ) }}" onclick="event.preventDefault(); document.getElementById( 'logout-form' ).submit();" class="logout-button align-right btn">Logout</a>
            <form id="logout-form" action="{{ route( 'logout' ) }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif
    </div>
    <div id="" class="col-md-12">
        {{-- <h1>Welcome</h1> --}}
        <div id="sidebar" class="col-md-2 sidebar">
            @if( Auth::check() )
                @include( 'users.user-sidebar' )
            @endif
        </div>
        <div id="content-container" class="col-md-8">
            @yield( 'content' )
        </div>
        <div class="col-md-2">
        </div>
    </div>
</body>

</html>



<script>
    $( 'document' ).ready( function() {

    } );

    function login()
    {
        console.log( 'User should now have logged in~' );
    }
</script>
