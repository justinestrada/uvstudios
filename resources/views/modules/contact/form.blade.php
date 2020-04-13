@php
$nf_id = get_field('nf_id');
@endphp
@if ($nf_id)
  <section id="form" class="container mb-5">
    <div class="row">
      <div class="col">
        {!! do_shortcode('[ninja_form id=' . $nf_id . '] '); !!}
      </div>
    </div>
  </section>
@endif
