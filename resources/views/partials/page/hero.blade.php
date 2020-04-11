@php
$feat_img = (get_the_post_thumbnail_url( get_the_ID(), 'full' )) ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : App\asset_path('images/bg/default.jpg');
@endphp
<section id="page-hero" class="container-fluid" style="background-image: url('{{ $feat_img }}');" >
  <div class="row h-100" >
    <div class="container">
      <div class="row h-100 d-flex justify-content-center align-items-center">
        <div class="col">
          <h1 class="text-white title animated fadeInUpOnce" >
          @if ( is_404() )
            404 - Page Not Found
          @else
            {!! the_title() !!}
          @endif
          </h1>
        </div>
      </div>
    </div>
  </div>
  @if ( !is_404() )
    <button id="hero-arrow-down" class="btn btn-transparent btn-arrow-down" type="button" >
      <span class="sr-only">Down</span>
      <img src="{{ App\asset_path('images/icon/arrow-white.svg') }}" alt="Arrow Down" style="height: 24px;"/>
    </button>
  @endif
</section>
