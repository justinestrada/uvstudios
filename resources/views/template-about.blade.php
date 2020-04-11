{{--
  Template Name: About
--}}

@extends('layouts.app')

@section('content')
  @include('partials.page.breadcrumb', ['bg_color' => 'lightest-gray'])
  @while(have_posts()) @php the_post() @endphp
    @include('modules.template-about.mission')
    @include('modules.template-about.our-story')
    @include('modules.template-about.instagram')
  @endwhile
@endsection
