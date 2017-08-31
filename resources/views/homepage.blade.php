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

    <style>
        .login-button {
            background-color: #44F500;
        }
        .logout-button {
            background-color: #FF0000;
        }
        .align-right {
            float: right;
            margin: 5px 5px 5px 5px;
        }
    </style>
</head>

<body>
    <div>
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
    <div>
        {{-- <h1>Welcome</h1> --}}
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
