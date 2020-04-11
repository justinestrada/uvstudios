{{--
  Template Name: Home
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('modules.home.hero-carousel')
    @include('modules.home.why')
    {{-- <section class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mb-3">FAR-UVC Disinfectant Light</h2>
          <p class="mb-3">Chloe uses 275nm a type of ultraviolet light called Far-UVC <br class="d-none d-xl-block">safe for skin and eyes but lethal to bacteria and viruses.</p>
          <a href="/shop" class="btn btn-primary">Shop Now</a>
        </div>
      </div>
    </section> --}}
    <style>
    .bg-overlay {
      position: relative;
    }
    .bg-overlay::before {
      content: "";
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }
    </style>
    <section class="bg-overlay py-5" style="background-size: cover; background-position: center; background-image: url('{{ App\asset_path('images/bg/default.jpg') }}')">
      <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h2 class="text-white fs-lg-3.5x mb-3">FAR-UVC <br class="d-lg-none">Disinfectant Light</h2>
            <p class="text-white fs-1.25x mb-5">Chloe uses 275nm a type of ultraviolet light called Far-UVC <br class="d-none d-xl-block">safe for skin and eyes but lethal to bacteria and viruses.</p>
            <a href="/shop" class="btn btn-primary">Buy Now</a>
          </div>
        </div>
      </div>
    </section>
    {{-- @include('modules.home.mission') --}}
    {{-- @include('modules.home.feat-products') --}}
    @include('modules.home.reviews')
    {{-- @include('modules.home.latest-article') --}}
    @include('modules.home.question')
    @include('modules.home.charity')
    {{-- @include('modules.home.social') --}}
    @include('partials.modal.newsletter')
  @endwhile
@endsection
