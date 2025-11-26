<section class="splide pb-0" aria-labelledby="carousel-heading">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach($sliders as $slider)
            <li class="splide__slide">
                <img class="rounded" src="{{$slider?->getFirstMediaUrl('slider', 'slider')}}" alt="{{$slider?->title}}">
            </li>
            @endforeach
        </ul>
    </div>
</section>

<!-- start section -->
<section class="p-0 border-bottom border-color-extra-medium-gray">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 row-cols-sm-2 justify-content-center"
             data-anime='{ "el": "childs", "translateX": [50, 0], "opacity": [0,1], "duration": 800, "delay": 0, "staggervalue": 500, "easing": "easeOutQuad" }'>

            <!-- Danışan Başarı Oranı -->
            <div
                class="col pt-35px pb-35px md-pb-0 text-dark-gray border-end border-color-extra-medium-gray sm-border-end-0">
                <div
                    class="d-flex flex-column flex-lg-row align-items-center justify-content-center text-center text-lg-start">
                    <div class="flex-shrink-0 me-15px md-me-0">
                        <h2 class="mb-0 fw-800">98<sup class="fs-24">%</sup></h2>
                    </div>
                    <div>
                        <span class="lh-24 fw-600 d-block">Hedefine ulaşan <br/> danışan oranı</span>
                    </div>
                </div>
            </div>

            <!-- Puan ve Yorumlar -->
            <div
                class="col pt-35px pb-35px md-pb-0 text-dark-gray border-end border-color-extra-medium-gray sm-border-end-0">
                <div
                    class="d-flex flex-column flex-lg-row align-items-center justify-content-center text-center text-lg-start">
                    <div class="flex-shrink-0 me-15px md-me-0">
                        <h2 class="mb-0 fw-800 ls-minus-3px">4.9</h2>
                    </div>
                    <div>
                        <div class="review-star-icon fs-20 d-inline-block text-gradient-orange-sky-blue">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <span class="lh-24 fw-600 d-block">Danışan memnuniyet puanı</span>
                    </div>
                </div>
            </div>

            <!-- Tekrar Randevu Oranı -->
            <div class="col pt-35px pb-35px text-dark-gray">
                <div
                    class="d-flex flex-column flex-lg-row align-items-center justify-content-center text-center text-lg-start">
                    <div class="flex-shrink-0 me-15px md-me-0">
                        <h2 class="mb-0 fw-800">97<sup class="fs-24">%</sup></h2>
                    </div>
                    <div>
                        <span class="lh-24 fw-600 d-block">Tekrar randevu <br/> alan danışanlar</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end section -->
