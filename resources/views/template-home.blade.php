{{--
  Template Name: Home
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('modules.home.hero-carousel')
    @include('modules.home.why')
    @include('modules.home.petri-dish')
    {{-- <section class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mb-3">FAR-UVC Disinfectant Light</h2>
          <p class="mb-3">Chloe uses 275nm a type of ultraviolet light called Far-UVC <br class="d-none d-xl-block">safe for skin and eyes but lethal to bacteria and viruses.</p>
          <a href="/shop" class="btn btn-primary">Shop Now</a>
        </div>
      </div>
    </section> --}}
    @include('modules.home.text-bg-img')
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
