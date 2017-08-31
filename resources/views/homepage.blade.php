<!doctype html>
<html lang="{{ app()->getLocale() }}">

<!-- jQuery -->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous">
</script>

<!-- Latest compiled and minified CSS -->
<link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">

<!-- Optional theme -->
<link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
    crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous">
</script>

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
