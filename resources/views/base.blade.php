<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Qualittá</title>
  @include('base/favicon')
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

  <!-- Styles -->

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
<body id="app-layout">
  <div class="wrapper">
    @include('base/menu')
    <div id="page-wrapper">
         <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('titulo')</h1>
                </div>
            </div>
        @yield('content')
    </div>
  </div>

  <!-- JavaScripts -->
  <script src="{{asset('js/script.js')}}"></script>
 <script>
      setSize();
      setCollapse();

      $(window).resize(function() {
        setSize();
        setCollapse();
      })
  </script>
</body>
</html>
