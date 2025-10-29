@if(!is_null($about))
    <section>
        <div class="container">
            <div class="row align-items-center justify-content-center mb-6">
                <div class="col-lg-6 md-mb-50px position-relative appear anime-complete"
                     data-anime="{ &quot;translateY&quot;: [0, 0], &quot;opacity&quot;: [0,1], &quot;duration&quot;: 1200, &quot;delay&quot;: 50, &quot;staggervalue&quot;: 150, &quot;easing&quot;: &quot;easeOutQuad&quot; }"
                     style="">
                    <div class="atropos atropos-rotate-touch" data-atropos="" data-atropos-perspective="2450">
                        <div class="atropos-scale"
                             style="transform: translate3d(0px, 0px, 0px); transition-duration: 300ms;">
                            <div class="atropos-rotate"
                                 style="transition-duration: 300ms; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg);">
                                <div class="atropos-inner">
                                    @if($about)
                                        <img
                                            src="{{$about->getFirstMediaUrl('about','about') ?: 'https://placehold.co/1000x751'}} "
                                            alt="" class="border-radius-6px" data-no-retina="">
                                    @else
                                        <img
                                            src="https://placehold.co/1000x751"
                                            alt="" class="border-radius-6px" data-no-retina="">
                                    @endif
                                    <span class="atropos-highlight"
                                          style="transform: translate3d(0px, 0px, 0px); transition-duration: 300ms; opacity: 0;"></span>
                                </div>
                                <span class="atropos-shadow"
                                      style="transform: translate3d(0px, 0px, -50px) scale(1); transition-duration: 300ms;"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6 text-right text-md-start"
                     data-anime='{ "opacity": [0,1], "duration": 600, "delay": 100, "staggervalue": 150, "easing": "easeOutQuad" }'>
                    <h2 class="fw-800 text-dark-gray ls-minus-2px">Hakkımda</h2>
                    <p class="mb-30px w-95 lg-w-100 xs-mb-25px">
                        {!! $about->medium_about ?? '' !!}
                    </p>
                    <div class="d-inline-block ">
                        <a href="{{route('about')}}"
                           class="btn btn-medium btn-switch-text btn-dark-gray btn-round-edge me-15px xs-me-5px">
                                    <span>
                                        <span
                                            class="btn-base-color btn-very-small">Devamını okuyun...</span>
                                    </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- end section -->
