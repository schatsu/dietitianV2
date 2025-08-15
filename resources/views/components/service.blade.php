<div>
    <section class="overflow-hidden bg-regal-blue position-relative border-radius-6px lg-border-radius-0px z-index-0">
        <img src="https://placehold.co//760x792" class="position-absolute top-minus-150px left-minus-30px z-index-minus-1" data-bottom-top="transform: rotate(0deg) translateY(0)" data-top-bottom="transform:rotate(-20deg) translateY(0)" alt="" />
        <div class="container">
            <div class="row align-items-center mb-6 sm-mb-9 text-center text-lg-start">
                <div class="col-lg-5 md-mb-20px">
                    <span class="ps-25px pe-25px mb-10px text-uppercase text-white fs-13 lh-42px fw-600 border-radius-100px bg-gradient-blue-whale-transparent d-inline-block">Hizmetlerim</span>
                    <h3 class="text-white fw-700 mb-0 ls-minus-1px">Hizmetlerim</h3>
                </div>
                <div class="col-lg-5 last-paragraph-no-margin md-mb-20px">
                    <p class="w-85 md-w-100">Bireysel ihtiyaçlarınıza göre özelleştirilmiş beslenme programları sunuyoruz</p>
                </div>
                <div class="col-lg-2 d-flex justify-content-center justify-content-lg-end">
                    <!-- start slider navigation -->
                    <div class="slider-one-slide-prev-1 icon-extra-medium text-white swiper-button-prev slider-navigation-style-04 border border-1 border-color-transparent-white-light">
                        <i class="feather icon-feather-chevron-left"></i>
                    </div>
                    <div class="slider-one-slide-next-1 icon-extra-medium text-white swiper-button-next slider-navigation-style-04 border border-1 border-color-transparent-white-light">
                        <i class="feather icon-feather-chevron-right"></i>
                    </div>
                    <!-- end slider navigation -->
                </div>
            </div>
            <div class="row align-items-center mb-6">
                <div class="col-12">
                    <div class="outside-box-right-25 sm-outside-box-right-0">
                        <div class="swiper magic-cursor slider-one-slide" data-slider-options='{ "slidesPerView": 1, "spaceBetween": 30, "loop": true, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "autoplay": { "delay": 4000, "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 }, "320": { "slidesPerView": 1 } }, "effect": "slide" }'>
                            <div class="swiper-wrapper">
                                @foreach($services as $service)
                                    <div class="swiper-slide">
                                        <div class="interactive-banner-style-09 border-radius-6px overflow-hidden position-relative">
                                            <img width="380" height="450" src="{{asset('storage/'.$service?->image)}}" alt="{{$service?->name}}" />
                                            <div class="opacity-extra-medium bg-gradient-dark-transparent"></div>
                                            <div class="image-content h-100 w-100 ps-15 pe-15 pt-13 pb-13 md-p-10 d-flex justify-content-bottom align-items-start flex-column">
                                                <div class="hover-label-icon position-relative z-index-9">
                                                    <div class="label bg-base-color fw-600 text-white text-uppercase border-radius-30px ps-20px pe-20px fs-12 ls-05px">Kişiye Özel</div>
                                                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                                        <path d="M15.25 6.75C15.25 6.42574 15.203 6.11349 15.1152 5.81934L15.0137 5.53125C14.5309 4.33895 13.3627 3.5 12 3.5C10.7222 3.5 9.61499 4.23752 9.08398 5.3125L8.98633 5.53125C8.8344 5.90658 8.75 6.31763 8.75 6.75C8.75 8.54493 10.2051 10 12 10C13.7949 10 15.25 8.54493 15.25 6.75ZM12.4697 5.21973C12.7626 4.92683 13.2374 4.92683 13.5303 5.21973C13.8232 5.51262 13.8232 5.98738 13.5303 6.28027L12.5303 7.28027C12.2374 7.57317 11.7626 7.57317 11.4697 7.28027C11.1768 6.98738 11.1768 6.51262 11.4697 6.21973L12.4697 5.21973ZM16.75 6.75C16.75 9.37335 14.6234 11.5 12 11.5C9.37665 11.5 7.25 9.37335 7.25 6.75C7.25 6.1215 7.37264 5.51983 7.5957 4.96875L7.73926 4.64844C8.51415 3.08028 10.1301 2 12 2C13.9946 2 15.7002 3.22936 16.4043 4.96875L16.4834 5.17773C16.6563 5.67066 16.75 6.20009 16.75 6.75Z" fill="#ffffff"/>
                                                        <path opacity="0.4" d="M7.73926 4.64844L7.5957 4.96875C7.46315 5.29622 7.36752 5.64179 7.31055 6H5.5C5.08579 6 4.75 6.33579 4.75 6.75V18.5C4.75 18.9142 5.08579 19.25 5.5 19.25H18.5C18.9142 19.25 19.25 18.9142 19.25 18.5V6.75C19.25 6.33579 18.9142 6 18.5 6H16.6904C16.6455 5.71709 16.5761 5.44212 16.4834 5.17773L16.4043 4.96875C16.339 4.80747 16.2626 4.65194 16.1807 4.5H18.5C19.7426 4.5 20.75 5.50736 20.75 6.75V18.5C20.75 19.7426 19.7426 20.75 18.5 20.75H5.5C4.25736 20.75 3.25 19.7426 3.25 18.5V6.75C3.25 5.50736 4.25736 4.5 5.5 4.5H7.81934C7.79267 4.54944 7.7642 4.59797 7.73926 4.64844Z" fill="#ffffff"/>
                                                    </svg>
                                                </div>
                                                <div class="mt-auto d-flex align-items-start w-100 z-index-1 position-relative overflow-hidden flex-column">
                                                    <span class="text-white fw-600 fs-20">{{$service?->name}}</span>
                                                    <span class="content-title text-white fs-13 fw-500 text-uppercase ls-05px">{{$service?->description}}</span>
                                                </div>
                                                <div class="position-absolute left-0px top-0px w-100 h-100 bg-gradient-regal-blue-transparent opacity-9"></div>
                                                <div class="box-overlay bg-gradient-base-color-transparent"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <i class="bi bi-envelope text-white d-inline-block align-middle icon-extra-medium me-10px md-m-5px"></i>
                    <div class="fs-18 text-white d-inline-block align-middle">Sormak istediğiniz bir soru varsa hemen <a href="demo-corporate-contact.html" class="text-white text-decoration-line-bottom">iletişime geçin</a></div>
                </div>
            </div>
        </div>
    </section>
</div>
