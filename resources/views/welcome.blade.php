@extends('layouts.master')
@section('facebook-tags')
    <meta property="og:image" content="http://54.149.181.47/images/blackskull.jpg">
@stop

@section('content')
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1" style="background-color:#aaa;padding:1%;border-radius: 3px;">
            <div class="main-content-link">
                <div class="row">
                    <div class="col-xs-8">
                        <span class="main-content-title">
                            NEW ARRIVALS
                        </span>
                    </div>
                    <div class="col-xs-4">
                        <img class="img-responsive" style="border-radius:12px;max-height: 320px;" src="https://scontent-ort2-1.xx.fbcdn.net/v/t31.0-8/15540926_624810791040104_1557989138155771777_o.jpg?oh=ae9481f68b5176e3f83c0fa5a2b968ea&oe=58E6ED8E">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-10 col-xs-offset-1" style="background-color:#aaa;padding:1%;margin-top:10px;border-radius: 3px;">
            <div class="main-content-link">
                <div class="row">
                    <div class="col-xs-8">
                        <span class="main-content-title">
                            WINTER LINE
                        </span>
                    </div>
                    <div class="col-xs-4">
                        <img class="img-responsive" style="border-radius:12px;max-height: 320px;" src="https://scontent-ort2-1.xx.fbcdn.net/v/t1.0-9/12195932_459269320927586_4558979120605616634_n.jpg?oh=fd096bcd04e124976c28370a2fb0fc3a&oe=58F175DA">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-10 col-xs-offset-1">
        @if(env('APP_ENV') == 'production')
            @include('auth.instagram')
        @endif
    </div>


@stop