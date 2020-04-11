@php
$prev = get_previous_post_link( '&laquo; %link', '%title', true );
$next = get_next_post_link( '%link &raquo;', '%title', true );
@endphp
@if ($prev || $next)
  <section id="prev-next" class="mb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center text-md-left">
          @if ($prev)
            {!! $prev !!}
          @endif
        </div>
        <div class="col-md-6 text-center text-md-right">
          @if ($next)
            {!! $next !!}
          @endif
        </div>
      </div>
    </div>
  </section>
@endif
