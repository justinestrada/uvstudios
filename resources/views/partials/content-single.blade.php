<article @php post_class('container py-5') @endphp>
  <div class="row mb-5">
    <div class="col">
      <h1 class="entry-title">{!! get_the_title() !!}</h1>
      @include('partials/entry-meta')
    </div>
  </div>
  <div class="entry-content row mb-5">
    <div class="col">
      @php the_content() @endphp
    </div>
  </div>
  {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
