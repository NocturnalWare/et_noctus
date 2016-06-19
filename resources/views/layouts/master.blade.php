<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="http://159.203.77.45/favicon.ico" />
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="http://159.203.77.45/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://159.203.77.45/bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="http://localhost/et_noctus/public/css/final.css">
  <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
  
  <title>#StayAwakeToCreate</title>
  
  @yield('facebook-tags')

</head>

<body>

  @include('layouts.publicnav')

  <div id="wareHouse"></div>
  <div class="div-sm-12" style="margin-top:70px;">

    @yield('content')

  </div>
  @include('layouts.set-cart-id')
  @include('layouts.jsvars')
  @include('layouts.javascript')
  @yield('javascript')
</body>


</html>

