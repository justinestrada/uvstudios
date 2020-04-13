<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    {!! get_field('after_body_scripts', 'option') !!}
    @php do_action('get_header') @endphp
    @include('partials.header')
    <main class="main" role="document">
      <div class="content">
        @yield('content')
      </div>
    </main>
    @include('partials.toast.cookie-policy')
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    {{-- @include('partials.toast.cookie-policy') --}}
    @if ( ! is_user_logged_in() )
      @include('partials.modal.register')
      @include('partials.modal.login')
    @endif
    @php wp_footer() @endphp
  </body>
</html>
