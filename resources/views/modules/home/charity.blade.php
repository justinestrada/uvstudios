
@if ($charity = get_field('charity'))
  <section id="charity" class="container py-5">
    <div class="row">
      <div class="col-lg-4 text-center text-lg-left mb-3 mb-lg-0">
        <h2 class="text-uppercase fs-3.5x mb-3 mb-lg-5">Charity</h2>
        <h4 class="fs-2.5x mb-3 mb-lg-5">Your Purchase Supports</h4>
        <p class="fs-1.25x mb-3">Helping fund <u>ProjectCURE</u> with medical supplies pallets needed for the pandemic we all face.</p>
        <p class="mb-0"><i>"Stay safe stay healthy," <br class="d-none d-lg-block"/> ~ UV Studios Team</i></p>
      </div>
      @if ($charity['image'])
        <div class="col-lg-3 mb-3 mb-lg-0">
          <img src="{{ $charity['image']['url'] }}" alt="{{ $charity['image']['alt'] }}" class="w-100"/>
        </div>
        <div class="col-lg-5">
          <img src="{{ $charity['image_2']['url'] }}" alt="{{ $charity['image_2']['alt'] }}" class="w-100"/>
        </div>
      @endif
    </div>
  </section>
@endif
