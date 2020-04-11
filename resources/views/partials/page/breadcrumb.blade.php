
@php
$bg_color = (isset($bg_color)) ? $bg_color : 'lightest-gray';
@endphp
<section id="breadcrumb" class="py-3 bg-{{ $bg_color }} mb-5">
  <div class="container">
    <div class="row">
      <div class="col">
        <a href="{{ get_site_url() }}" class="text-uppercase text-dark-gray font-weight-bold mr-1" title="Home" >Home</a>
        <span class="mr-1">&raquo;</span>
        <span class="text-uppercase font-weight-bold">{!! get_the_title() !!}</span>
      </div>
    </div>
  </div>
</section>
