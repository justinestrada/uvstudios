
<section class="container mb-5">
  <div class="row">
    <div class="col">
      @php the_content() @endphp
      {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
    </div>
  </div>
</section>
