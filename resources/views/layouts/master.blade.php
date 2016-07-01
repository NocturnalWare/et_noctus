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
  <div id="wareHouse"></div>
    @yield('content')

  </div>
  @include('layouts.jsvars')
  @include('layouts.javascript')
  @yield('javascript')
  TEST IG STUFF
    <iframe src="https://api.instagram.com/v1/tags/stayawaketocreate?access_token={{ENV('INSTAGRAM_ACCESS')}}"></iframe>
    Instagram::tags('stayawaketocreate')->get(21)
    <a href="https://api.instagram.com/oauth/authorize/?client_id={{ENV('INSTAGRAM_ID')}}&redirect_uri=https://staging11.eternallynocturnal.com/ig/auth&response_type=code">iglogin??</a>
</body>


</html>

