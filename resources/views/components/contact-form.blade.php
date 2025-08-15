<div>
    <section class="bg-gradient-quartz-white position-relative z-index-0 sm-pt-0">
        <div class="container-fluid overflow-hidden position-relative pt-6 sm-pt-40px">
            <img src="{{asset('frontend/images/demo-corporate-contact-bg-01.png')}}"
                 class="position-absolute top-0 left-minus-300px z-index-minus-1"
                 data-bottom-top="transform: rotate(0deg) translateY(0)"
                 data-top-bottom="transform:rotate(-15deg) translateY(0)" alt="" data-no-retina="" style="">
            <div class="row justify-content-center mb-2 sm-mb-3">
                <div class="col-lg-6 text-center appear anime-child anime-complete"
                     data-anime="{ &quot;el&quot;: &quot;childs&quot;, &quot;translateY&quot;: [30, 0], &quot;opacity&quot;: [0,1], &quot;duration&quot;: 600, &quot;delay&quot;:0, &quot;staggervalue&quot;: 300, &quot;easing&quot;: &quot;easeOutQuad&quot; }">
                    <span
                        class="ps-25px pe-25px mb-15px text-uppercase text-base-color fs-14 lh-42px fw-700 border-radius-100px bg-gradient-quartz-light-transparent d-inline-block"
                        style="">İletişim</span>
                    <h3 class="text-dark-gray fw-700 ls-minus-1px" style="">Size nasıl yardımcı olabilirim?</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-7 col-lg-11">
                    <form action="#" method="post" class="contact-form-style-03">
                        @csrf
                        <div class="row justify-content-center appear anime-complete"
                             data-anime="{ &quot;opacity&quot;: [0,1], &quot;duration&quot;: 600, &quot;delay&quot;:0, &quot;staggervalue&quot;: 300, &quot;easing&quot;: &quot;easeOutQuad&quot; }"
                             style="">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1"
                                       class="form-label fw-600 text-dark-gray mb-0">Ad*</label>
                                <div class="position-relative form-group mb-25px">
                                    <span class="form-icon"><i class="bi bi-emoji-smile"></i></span>
                                    <input
                                        class="ps-0 border-radius-0px border-color-extra-medium-gray bg-transparent form-control required"
                                        id="exampleInputEmail1" type="text" name="name" placeholder="Adınızı giriniz?">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1"
                                       class="form-label fw-600 text-dark-gray mb-0">E-posta*</label>
                                <div class="position-relative form-group mb-25px">
                                    <span class="form-icon"><i class="bi bi-envelope"></i></span>
                                    <input
                                        class="ps-0 border-radius-0px border-color-extra-medium-gray bg-transparent form-control required"
                                        id="exampleInputEmail2" type="email" name="email"
                                        placeholder="E-posta adresini giriniz">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1"
                                       class="form-label fw-600 text-dark-gray mb-0">Telefon</label>
                                <div class="position-relative form-group mb-25px">
                                    <span class="form-icon"><i class="bi bi-telephone"></i></span>
                                    <input
                                        class="ps-0 border-radius-0px border-color-extra-medium-gray bg-transparent form-control"
                                        id="exampleInputEmail3" type="tel" name="phone"
                                        placeholder="Telefon numaranızı giriniz">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1"
                                       class="form-label fw-600 text-dark-gray mb-0">Konu</label>
                                <div class="position-relative form-group mb-25px">
                                    <span class="form-icon"><i class="bi bi-journals"></i></span>
                                    <input
                                        class="ps-0 border-radius-0px border-color-extra-medium-gray bg-transparent form-control"
                                        id="exampleInputEmail4" type="text" name="subject"
                                        placeholder="Hangi konuda yardımcı olabilirim?">
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="exampleInputEmail1"
                                       class="form-label fw-600 text-dark-gray mb-0">Mesaj</label>
                                <div class="position-relative form-group form-textarea mb-0">
                                    <textarea
                                        class="ps-0 border-radius-0px border-color-extra-medium-gray bg-transparent form-control"
                                        name="message" placeholder="Lütfen mesajınızı giriniz" rows="4"></textarea>
                                    <span class="form-icon"><i class="bi bi-chat-square-dots"></i></span>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-lg-7 col-md-8">
                                <a href="#" class="mb-0 fs-14 lh-24 text-center text-md-start">
                                    Gizliliğinizi korumaya kararlıyız. Açık izniniz olmadan hakkınızda asla bilgi
                                    toplamayacağız.
                                </a>
                            </div>
                            <div class="col-xxl-6 col-lg-5 col-md-4 text-center text-md-end sm-mt-25px">
                                <input id="exampleInputEmail5" type="hidden" name="redirect" value="">
                                <button
                                    class="btn btn-medium btn-dark-gray btn-box-shadow btn-round-edge text-transform-none primary-font submit"
                                    type="submit">Gönder
                                </button>
                            </div>
                            <div class="col-12">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
