<section id="reviews" class="bg-lightest-gray py-5">
  <div class="container">
    <div id="accordionWriteReview" class="mb-5">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link w-100 text-left text-black" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Write A Review <img src="{{ App\asset_path('images/icon/arrow.svg') }}" class="float-right" style="height: 24px; margin: 6px 0;" />
            </button>
          </h5>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionWriteReview">
          <div class="card-body">
            @php comments_template(); @endphp
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
