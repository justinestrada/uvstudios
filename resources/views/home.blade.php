@extends('layouts.app')

@section('content')
  <section id="blog" class="bg-lightest-gray py-5">
    <div class="container mb-5">
      <div class="row">
        <div class="col">
          <h2 class="text-uppercase">News</h2>
        </div>
        <div class="col text-center text-lg-right">
          <button type="button" class="btn btn-primary btn-rounded" title="Press Inquiries" data-toggle="modal" data-target="#pressModal" >Press Inquiries</button>
        </div>
      </div>
    </div>
    @include('partials.blog.filter')
    <div class="container">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.blog.content-single', ['post_id' => get_the_ID()])
      @endwhile
      @if (function_exists('wp_pagenavi'))
        <div class="row">
          <div class="col text-center">
            {!! wp_pagenavi() !!}
          </div>
        </div>
      @endif
    </div>
  </section>
  @include('partials.modal.press')
@endsection
