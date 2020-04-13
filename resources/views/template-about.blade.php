{{--
  Template Name: About
--}}

@extends('layouts.app')

@section('content')
  @include('partials.page.breadcrumb', ['bg_color' => 'lightest-gray'])
  @while(have_posts()) @php the_post() @endphp
    @include('modules.about.mission')
    @include('modules.about.our-story')
  @endwhile
@endsection
