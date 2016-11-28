<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="http://159.203.77.45/favicon.ico" />
  <link rel="stylesheet" href="{{ENV('APP_URL')}}/css/final.css">
  
  <title>#StayAwakeToCreate</title>
  
  @yield('facebook-tags')

</head>

<body style="max-height: 90%">

  <div id="wareHouse">
    @include('layouts.publicnav')
    <div style="margin-top:70px;">
      <div class="hidden-xs hidden-sm col-md-2" style="height:50%">
        <sidebar url="{{env('APP_URL')}}"></sidebar>
      </div>
      <div style="overflow-x: hidden;">
        <div class="div-sm-12 col-md-9" style="overflow-y: scroll;height:100%;width: 102%">
          @yield('content')
          <div class="row">
            <a target="_blank" style="color:#fff;font-size:2em" class="col-xs-1 col-xs-offset-4" href="https://twitter.com/enclothingco"><i class="fa fa-twitter"></i></a>
            <a target="_blank" style="color:#fff;font-size:2em" class="col-xs-1" href="https://www.facebook.com/EternallyNocturnal"><i class="fa fa-facebook-official"></i></a>
            <a target="_blank" style="color:#fff;font-size:2em" class="col-xs-1" href="https://www.instagram.com/eternally_nocturnal"><i class="fa fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.jsvars')
  @include('layouts.javascript')
  @yield('javascript')
</body>


</html>

