
@if ($section = get_field('question_section'))
  <section id="questions" class="bg-lightest-gray py-5" style="background-image: url('{{ $section['bg_img'] }}');">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card p-3 p-xl-5 text-center" style="background-color: rgba(189, 52, 220, 0.75);">
            <h3 class="text-white fs-lg-3x mb-3"><i>{!! $section['title'] !!}</i></h3>
            <p class="text-white fs-1.25x mb-0"><i>{!! $section['desc'] !!}</i></p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
