<article @php post_class('card article-card z-depth-1 mb-5') @endphp>
  <div class="row">
    <div class="col-lg-4 mb-3 mb-lg-0">
      <a href="{{ get_the_permalink() }}" title="{!! get_the_title() !!}" class="d-block article-img" style="background-image: url({{ get_the_post_thumbnail_url( $post_id, 'full' ) }})" >
        <span class="sr-only">{!! get_the_title() !!}</span>
      </a>
    </div>
    <div class="col-lg-8 d-lg-flex align-items-lg-center">
      <div class="p-3">
        <h3 class="entry-title text-black text-uppercase">
          <a href="{{ get_the_permalink() }}" title="{{ the_title_attribute() }}" class="text-black">{!! get_the_title() !!}</a>
        </h3>
        @include('partials/entry-meta')
        <div class="entry-content text-dark-gray">
          {!! get_the_excerpt() !!}
        </div>
      </div>
    </div>
  </div>
</article>
