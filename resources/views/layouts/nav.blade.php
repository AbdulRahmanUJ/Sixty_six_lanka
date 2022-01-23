<li class="nav-item">
  <a class="nav-link {{request()->is('/')?'active':''}}" href="/">Home <span class="sr-only">(current)</span></a>
</li>
@guest

@else
  {{-- <li class="nav-item">
    <a class="nav-link {{request()->is('receiver')?'active':''}}" href="/receiver">Receiver</a>
  </li> --}}
  {{-- <li class="nav-item">
    <a class="nav-link {{request()->is('package')?'active':''}}" href="/package">Package</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{request()->is('packagetype')?'active':''}}" href="/packagetype">Package Type</a>
  </li> --}}
@endguest
<li class="nav-item">
  <a class="nav-link {{request()->is('contact')?'active':''}}" href="/contact">Contact Us <span class="sr-only"></span></a>
</li>
