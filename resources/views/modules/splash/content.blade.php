<style>
.site-name {
  font-size: 2.75rem;
}
@media (min-width: 992px) {
  .site-name {
    font-size: 3.5rem;
  }
}
#contact {
  display: none;
}
</style>
<section id="splash" class="container-fluid d-flex justify-content-center align-items-center" style="background-image: url('{{ (get_the_post_thumbnail_url( get_the_ID(), 'full' )) ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : App\asset_path('images/bg/default.jpg') }}');">
  <div class="row py-5">
    <div class="container inner-splash-container">
      <div class="row mb-3">
        <div class="col text-center text-black">
          <h3 class="text-uppercase mb-0" >Coming Soon</h3>
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <div class="col-auto">
          <img src="{{ App\asset_path('images/logo/uv-studios.svg') }}" alt="{{ bloginfo('name') }}" class="d-block w-100 mx-auto" style="max-width: 512px;"/>
          {{-- <h1 class="site-name text-uppercase">{{ bloginfo('name') }}</h1> --}}
        </div>
      </div>
      <div class="row justify-content-center mb-3">
        <div class="col-auto">
          <div id="countdown" class="text-center" style="display: none;" >
            <ul class="mb-3">
              <li>
                <small>Days</small>
                <span id="days" ></span>
              </li>
              <li>
                <small>Hours</small>
                <span id="hours"></span>
              </li>
              <li>
                <small>Minutes</small>
                <span id="minutes"></span>
              </li>
              <li>
                <small>Seconds</small>
                <span id="seconds"></span>
              </li>
            </ul>
            <h3 class="m-0" >Until The #1 UVC Disinfection Website Launches!</h3>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-auto text-center">
          <p class="text-black" >Be the first to experience this revolutionary disinfectant technology.</p>
          <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#signupModal" >Join The Waitlist</button>
          <p class="text-black m-0" >Join to receive a discount at launch!</p>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- <footer id="splash-footer" class="container-fluid">
  <div class="row">
    <div class="col text-center">
      <p class="text-black">Copyright &copy; {{ bloginfo('name') }}</p>
    </div>
  </div>
</footer> --}}
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
        @if ($nf_id = get_field('nf_id'))
          {!! do_shortcode('[ninja_form id="' . $nf_id . '"]') !!}
        @else
          <div class="alert alert-info mb-0">
            <p class="text-info mb-0">Ninja Form ID is missing.</p>
          </div>
        @endif
			</div>
		</div>
	</div>
</div>
