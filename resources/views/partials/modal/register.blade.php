
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h5 class="modal-title text-uppercase" id="registerModalLabel">User Registration</h5>
      </div> --}}
      <div class="modal-body p-lg-5">
        <button type="button" class="close hover-spin" data-dismiss="modal" aria-label="Close">
          <img src="{{ App\asset_path('images/icon/close-black.svg') }}" alt="Close" style="height: 24px; margin-top: -4px;" >
        </button>
        <div class="mb-3">
          <span class="d-block ff-owslwad text-uppercase" style="font-size: 1.5rem; line-height: 1.5rem; ">User</span>
          <span class="d-block ff-owslwad text-uppercase text-green" style="font-size: 3rem; line-height: 3rem;">Registration</span>
        </div>
        <p>Get access to your profile, track orders and manage subscriptions.</p>
        <div class="mb-3">
          @include('partials.register.form')
        </div>
        <p class="text-center text-uppercase mb-3">Or</p>
        <a href="#login" class="btn btn-outline-black btn-rounded btn-block" data-dismiss="modal" aria-label="Close Login Open Register" data-toggle="modal" data-target="#loginModal" >Login</a>
      </div>
    </div>
  </div>
</div>
