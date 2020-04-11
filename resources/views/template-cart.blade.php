{{--
  Template Name: Cart
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page.breadcrumb')
    <section id="cart" class="container-fluid" style="margin-top: 40px;" >
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col">
              @include('partials.content-page')
            </div>
          </div>
        </div>
      </div>
    </section>
  @endwhile
@endsection
