
@if ($reviews = get_field('reviews'))
  <section id="reviews" class="bg-light-gray py-5" style="background-image: url('{{ App\asset_path('images/bg/chloe-top-left-2.png') }}')">
    <div class="container">
      <div class="row pt-5 mt-5 mb-5">
        <div class="col pt-5 text-center">
          <h2 class="fs-3.5x mb-0">What They're Saying</h2>
        </div>
      </div>
      <div id="carouselReviewsIndicators" class="carousel slide mb-5" data-ride="carousel">
        @if (count($reviews) > 1)
          <ol class="carousel-indicators">
            @foreach ($reviews as $key => $review)
              <li data-target="#carouselReviewsIndicators" data-slide-to="{{ $key }}" {!! $key === 0 ? 'class="active"' : '' !!}></li>
            @endforeach
          </ol>
        @endif
        <div class="carousel-inner">
          @foreach ($reviews as $key => $review)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
              <div class="row d-flex justify-content-center">
                <div class="col-lg-8 text-center">
                  <div class="mb-3">
                    @for ($i = 0; $i < $review['rating']; $i++)
                      @if ($i !== (int)$review['rating'])
                        <i class="fa fa-star fs-1.25x text-yellow" aria-hidden="true"></i>
                      @else
                        <i class="fa fa-star-half-o fs-1.25x text-yellow" aria-hidden="true"></i>
                      @endif
                    @endfor
                  </div>
                  <p class="fs-1.25x mb-3">"{!! $review['comment'] !!}"</p>
                  <h4 class="mb-0s">{{ $review['full_name'] }}</h4>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        @if (count($reviews) > 1)
          <a class="carousel-control-prev" href="#carouselReviewsIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselReviewsIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        @endif
      </div>
    </div>
  </section>
@endif
