{{--
  Template Name: Style Guide
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('modules.template-styleguide.content')
  @endwhile
@endsection
