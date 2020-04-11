@extends('layouts.app')

@section('content')
  @include('partials.page.hero')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.post.breadcrumb')
    @include('partials.content-single')
    @include('partials.post.prev-next')
  @endwhile
@endsection
