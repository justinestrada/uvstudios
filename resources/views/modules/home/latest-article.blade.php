@if ( $latest_article = get_field('latest_article') )
  @php
  $latest_blog_post = get_posts( array(
    'posts_per_page' => 1,
    // 'order'=> 'DESC',
    // 'orderby' => 'date',
  ));
  @endphp
  <section id="latest-article" class="py-5">
    <div class="container container-bg">
      <div class="row">
        <div class="col text-left">
          <h2 class="text-uppercase mb-3">Latest <br><span class="d-block ff-owslwad" style="font-size: 3rem; line-height: 3rem;" >News Article</span></h2>
          @if ( $latest_blog_post )
            <article class="card article-card z-depth-1 mb-5">
              <div class="row">
                <div class="col-lg-4 mb-3 mb-lg-0">
                  <a href="{{ get_the_permalink($latest_blog_post[0]->ID) }}" class="d-block article-img" style="background-image: url({{ get_the_post_thumbnail_url( $latest_blog_post[0]->ID, 'full' ) }})" title="View More">
                    <span class="sr-only">{{ $latest_blog_post[0]->post_title }}</span>
                  </a>
                </div>
                <div class="col-lg-8 d-lg-flex align-items-lg-center">
                  <div class="p-3">
                    <h3 class="text-uppercase mb-3">
                      <a href="{{ get_the_permalink($latest_blog_post[0]->ID) }}" class="text-black" title="{{ $latest_blog_post[0]->post_title }}" >{{ $latest_blog_post[0]->post_title }}</a>
                    </h3>
                    @include('partials/entry-meta')
                    <div class="text-dark-gray">{!! get_the_excerpt($latest_blog_post[0]->ID) !!}</div>
                  </div>
                </div>
              </div>
            </article>
          @endif
          <a href="{{ get_permalink( $latest_article['posts_page_id'] ) }}" class="btn btn-outline-black btn-rounded" title="All Articles" >All Articles</a>
        </div>
      </div>
    </div>
  </section>
@endif
