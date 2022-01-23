<li class="nav-item">
  <a class="nav-link {{request()->is('/')?'active':''}}" href="/">Home <span class="sr-only">(current)</span></a>
</li>
@guest

@else
@endguest
<li class="nav-item">
  <a class="nav-link {{request()->is('contact')?'active':''}}" href="/contact">Contact Us <span class="sr-only"></span></a>
</li>
