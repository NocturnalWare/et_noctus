@if(empty(Session::get('cart_id')))
  {!! Session::set('cart_id', str_random(32)) !!}
@endif