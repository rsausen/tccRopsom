 <!DOCTYPE html>
 <html lang="pt">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Qualittá - Login</title>
  @include('base/favicon')
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

  <!-- Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

  <link rel="stylesheet" href="{{asset('css/style.css')}}">

  <link rel="stylesheet" href="{{asset('js/jquery-ui.theme.min.css')}}">

  <style>

    body {
      font-family: 'Lato';
  }

  .fa-btn {
      margin-right: 6px;
  }

</style>

</head>
<body>

    <div class="container">
        <div class="row">
            <div class=" col-md-4 col-md-offset-4">
                 <img class="login-panel img-responsive" src="{{asset('/img/logologin.png')}}">
            </div>         
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                       <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-lg btn-login btn-block">
                                <i class="fa fa-btn fa-sign-in"></i> Login
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/script.js')}}"></script>
</body>

</html>
