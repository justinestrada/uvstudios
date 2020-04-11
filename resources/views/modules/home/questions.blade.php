
@if ($section = get_field('questions_section'))
  <section id="questions" class="bg-lightest-gray py-5" style="background-image: url('{{ $section['bg_img'] }}');">
    <div class="container">
      <div class="row">
        <div class="col">
          {{-- <h2 class="text-uppercase mb-5">CBD Questions</h2> --}}
          <div id="accordion">
            @foreach ($section['questions'] as $index => $item)
              <div class="card z-depth-1 mb-3">
                <div class="card-header" id="heading{{ $index }}">
                  <h5 class="mb-0">
                    <button class="btn btn-link {{ ($index > 0) ? 'collapsed' : '' }} w-100 text-left text-black p-0" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="{{ ($index === 0) ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                      {{ $item['question'] }}<img src="{{ App\asset_path('images/icon/arrow.svg') }}" class="float-right" style="height: 24px; margin: 6px 0;" />
                    </button>
                  </h5>
                </div>
                <div id="collapse{{ $index }}" class="collapse {{ ($index === 0) ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-parent="#accordion">
                  <div class="card-body">
                    {!! $item['answer'] !!}
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
