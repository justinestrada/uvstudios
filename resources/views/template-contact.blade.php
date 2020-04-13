{{--
  Template Name: Contact
--}}

@extends('layouts.app')

@section('content')
  @include('partials.page.breadcrumb')
  @while(have_posts()) @php the_post() @endphp
    @include('modules.contact.form')
    @include('modules.contact.faq')
  @endwhile
@endsection
