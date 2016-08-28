<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="http://159.203.77.45/favicon.ico" />
  <link rel="stylesheet" href="{{ENV('APP_URL')}}/css/final.css">
  
  <title>#StayAwakeToCreate</title>
  
  @yield('facebook-tags')

</head>

<body>

  @include('layouts.publicnav')

  <div class="div-sm-12" style="margin-top:70px;">
  <div id="wareHouse">
    @yield('content')
    <show-manager></show-manager>

  </div>

  </div>
  @include('layouts.jsvars')
  @include('layouts.javascript')
  @yield('javascript')
</body>


</html>

