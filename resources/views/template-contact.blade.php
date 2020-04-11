{{--
  Template Name: Contact
--}}

@extends('layouts.app')

@section('content')
  @include('partials.page.breadcrumb')
  @while(have_posts()) @php the_post() @endphp
    @include('modules.template-contact.form')
    @include('modules.template-contact.faq')
  @endwhile
@endsection
