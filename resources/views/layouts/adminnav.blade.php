
<li>
  <a style="background-color:#000;color:#fff" type="button" class="dropdown nav-button-etnoc btn btn-lg" href="{{route('logout')}}">
      <b>Logout</b>
  </a>
</li>
<li>
  <a style="background-color:#000;color:#fff" id="dLabel" type="button" class="dropdown nav-button-etnoc btn btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Manage
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" style="border-bottom:1px solid #fff;text-align:center;background-color:#000;color:#fff" aria-labelledby="dLabel">
    <li></li>
    <a class="btn btn-lg" href="{{route('productmanager.index')}}">Products</a>
    <a class="btn btn-lg" href="{{route('inventory.index')}}">Inventory</a>
    <a class="btn btn-lg" href="{{route('reports.index')}}">Inventory Report</a>
    <li class="btn btn-lg">Contacts</li>
    <li class="btn btn-lg">Venues</li>
    <li class="btn btn-lg"><a href="{{route('orders.index')}}">Orders</a></li>
    <li class="btn btn-lg">Bands</li>
    <a class="btn btn-lg" href="{{route('shippingManager')}}">Shipping</a>
    <li class="btn btn-lg">Shows</li>
      <a href="{{route('products.index')}}" style="color:#fff"><li class="btn btn-lg">Go to Storefront</li></a>
  </ul>

