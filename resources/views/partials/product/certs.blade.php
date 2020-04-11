<style>
#certs::before {
  /* background-image: url("{{ App\asset_path('images/leaves-top-right.png') }}"); */
}
</style>
<section id="certs" class="bg-green-gradient-light-green py-3 mb-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-3 mb-lg-0">
          <div class="row mx-auto" style="width: fit-content;">
            <div class="col">
                <img src="{{ App\asset_path('images/icon/award-white.svg') }}" alt="Certificate" class="d-inline-block" style="height: 128px;"/>
            </div>
            <div class="col d-flex align-items-center">
                <div class="inline-block">
                  <p class="text-white font-weight-bold">Made In <br> <span class="ff-owslwad" style="font-size: 2rem;">USA</span></p>
                </div>
            </div>
          </div>
      </div>
      <div class="col-lg-6">
        <div class="row mx-auto" style="width: fit-content;">
          <div class="col">
              <img src="{{ App\asset_path('images/icon/award-white.svg') }}" alt="Certificate" class="d-inline-block" style="height: 128px;"/>
          </div>
          <div class="col d-flex align-items-center">
              <div class="inline-block">
                <p class="text-white font-weight-bold">Non <br> <span class="ff-owslwad" style="font-size: 2rem;">GMO</span></p>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
