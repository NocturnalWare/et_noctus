<nav class="navbar navbar-default navbar-fixed-top">
  
  <div class="container-fluid"  style="background-color:#000;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('welcome')}}" style=""><img height="190%" src="https://eternallynocturnal.com/images/WEBSITEBANNERTEXT.png" /></a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span style="padding:0px"class="icon-bar"></span>
        <span style="padding:0px"class="icon-bar"></span>
        <span style="padding:0px"class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">

        <li class="btn btn-sm mobile-nav-button-etnoc"></li>
      </ul>
      <ul class="nav navbar-nav navbar-right" style="text-align:center;padding-top:10px;">
          <li id="cartIcon">
            <cart-index></cart-index>
          </li>

          <li class="hidden-md hidden-lg">
            <a style="background-color:#000;color:#fff" id="dLabel" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Shop
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" style="border-bottom:1px solid #fff;text-align:center;background-color:#000;color:#fff" aria-labelledby="dLabel">
              <a class="row" href="{{ route('products.index') }}" style="color:#fff"><li class="col-sm-12 btn btn-lg">Everything</li></a>
                @include('products.product-categories')
                <br>
            </ul>
          </li>
        <li class="btn btn-sm nav-button-etnoc hidden-xs hidden">Shows</li>
        <li class="hidden-md hidden-lg">
          <a style="background-color:#000;color:#fff" id="dLabel" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sponsored Bands
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" style="border-bottom:1px solid #fff;text-align:center;background-color:#000;color:#fff" aria-labelledby="dLabel">
              <a href="{{route('bands.show', 1)}}" style="color:#fff"><li class="btn btn-lg">Adventurer</li></a><br>
              <a href="{{route('bands.show', 5)}}" style="color:#fff"><li class="btn btn-lg">Stories Untold</li></a><br>
              <a href="{{route('bands.show', 3)}}" style="color:#fff"><li class="btn btn-lg">The Illustrator</li></a><br>
              <a href="{{route('bands.show', 2)}}" style="color:#fff"><li class="btn btn-lg">The Banshee Pilot</li></a><br>
              <a href="{{route('bands.show', 4)}}" style="color:#fff"><li class="btn btn-lg">Shapes & Colors</li></a><br>
          </ul>
        </li>
        <li>
          <a href="" style="color:#fff" class="nav-button-etnoc btn btn-lg">
            <b>Spotlight</b>
          </a>

        </li>

        <li>
          <a href="{{route('contact.index')}}" style="background-color:#000;color:#fff" class="nav-button-etnoc btn btn-lg">
            <b>Contact</b>
          </a>
        </li>
          @if(\Auth::check())
            <a style="background-color:#000;color:#fff" href="{{route('admin.index')}}" class="nav-button-etnoc btn btn-lg">Manage</a>
          @else
          <a style="background-color:#000;color:#fff" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="modal" data-target="#Login">
                <b>Login</b>
          </a>
          @endif
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
@include('layouts.login-modal')
<!-- Button trigger modal -->
