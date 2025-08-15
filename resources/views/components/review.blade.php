<div>
    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center mb-6 sm-pb-9">
                <h4 class="text-dark-gray fw-700 text-center">Danışan Yorumları</h4>
            </div>
            <div class="col-12"
                 data-anime='{ "translateX": [0, 0], "opacity": [0,1], "duration": 1200, "delay": 100, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <div class="swiper slider-one-slide magic-cursor dark"
                     data-slider-options='{ "slidesPerView": 1, "spaceBetween": 25, "loop": true, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "autoplay": { "delay": 3000, "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1400": { "slidesPerView": 3 }, "1200": { "slidesPerView": 3 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 }, "320": { "slidesPerView": 1 } }, "effect": "slide" }'>
                    <div class="swiper-wrapper pt-30px pb-30px">
                        <!-- start review item -->
                        @forelse($reviews as $review)
                            <div class="swiper-slide review-style-07">
                                <div
                                    class="d-flex justify-content-center h-100 flex-column border-radius-6px p-12 bg-white box-shadow-extra-large xl-p-10">
                                    <div class="mb-20px">
                                        <img
                                            src="https://ui-avatars.com/api/?uppercase=true&name={{$review?->client_name}}&rounded=true&format=png&background=162340&color=ffffff&size=148"
                                            class="rounded-circle w-90px lg-w-65px me-15px" alt="">
                                        <div class="d-inline-block align-middle">
                                            <div class="text-dark-gray fs-18 fw-600">{{$review?->client_name}}</div>
                                            <div class="lh-24 fs-16">Danışan</div>
                                        </div>
                                    </div>
                                    <p class="mb-15px md-w-85 sm-w-100">“{{$review?->review}}”</p>
                                    <div class="d-flex align-items-center">
                                        <div class="d-inline-block me-auto">
                                            <div
                                                class="text-dark-gray fw-700 float-start fs-15 me-10px">{{$review->rating ?? 0}}</div>
                                            <div class="review-star-icon float-start">
                                                <div class="rating-readonly"
                                                     data-rating="{{ $review->rating ?? 0 }}"></div>
                                            </div>
                                        </div>
                                        <div
                                            class="d-inline-block fw-500 text-uppercase border-radius-30px ps-15px pe-15px fs-12 lh-28 bg-dark-gray text-white">
                                            {{$review?->created_at->format('d/m/Y')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse
                        <!-- end review item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/rater-js@1.0.1/index.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.rating-readonly').each(function () {
                let ratingValue = $(this).data('rating') ?? 0;
                raterJs({
                    starSize: 20,
                    rating: ratingValue,
                    element: this,
                    readOnly: true,
                });
            });
        });
    </script>
@endpush
