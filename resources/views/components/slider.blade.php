@push('css')

@endpush
<div>
    <section id="slider" class="p-0 top-space-margin ">
        <div class="demo-dietitian-slider_wrapper fullscreen-container" data-alias="portfolio-viewer"
             data-source="gallery" style="background-color:transparent;padding:0px;">
            <div id="demo-dietitian-slider" class="rev_slider bg-regal-blue fullscreenbanner" style="display:none;"
                 data-version="5.3.1.6">
                <!-- begin slides list -->
                <ul>
                    <!-- minimum slide structure -->
                    @foreach($sliders as $slider)
                        <li data-index="rs-{{$slider?->hashid()}}" data-transition="parallaxleft"
                            data-slotamount="default"
                            data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                            data-easeout="default" data-masterspeed="1500" data-rotate="0"
                            data-saveperformance="off"
                            data-title="Crossfit" data-param1="" data-param2="" data-param3="" data-param4=""
                            data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                            data-param10=""
                            data-description="">
                            <!-- slide's main background image -->
                            <img src="{{$slider?->image_url}}" alt="{{$slider?->title}}"
                                 data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                                 class="rev-slidebg" data-no-retina>
                            <!-- start overlay layer -->
                            <div class="tp-caption tp-shape tp-shapewrapper "
                                 id="slide-{{$slider?->hashid()}}-layer-01"
                                 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                 data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                 data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape"
                                 data-basealign="slide" data-responsive_offset="off" data-responsive="off"
                                 data-frames='[{"delay":0,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},
                                     {"delay":"wait","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]'
                                 style="background:rgba(22,35,63,0.1); z-index: 0;">
                            </div>
                            <!-- end overlay layer -->
                            <!-- start shape layer -->
                            <div
                                class="tp-caption tp-shape tp-shapewrapper tp-resizeme bg-regal-blue border-radius-50"
                                id="slide-{{$slider?->hashid()}}-layer-02"
                                data-x="['center','center','center','center']"
                                data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                data-voffset="['0','0','0','0']" data-width="['900','700','700','600']"
                                data-height="['900','700','700','600']" data-whitespace="nowrap" data-type="shape"
                                data-responsive_offset="on"
                                data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"x:0px;y:50px;rX:0deg;rY:0deg;rZ:0deg;sX:0.5;sY:0.5;opacity:0;","to":"o:0.5;","ease":"Back.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" style="z-index: 0;">
                            </div>
                            <!-- end shape layer -->
                            <!-- start shape layer -->
                            <div
                                class="tp-caption tp-shape tp-shapewrapper tp-resizeme bg-regal-blue border-radius-50"
                                id="slide-{{$slider?->hashid()}}-layer-03"
                                data-x="['center','center','center','center']"
                                data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                data-voffset="['0','0','0','0']" data-width="['1200','1000','900','800']"
                                data-height="['1200','1000','900','800']" data-whitespace="nowrap" data-type="shape"
                                data-responsive_offset="on"
                                data-frames='[{"delay":1300,"speed":1000,"frame":"0","from":"x:0px;y:50px;rX:0deg;rY:0deg;rZ:0deg;sX:0.5;sY:0.5;opacity:0;","to":"o:0.3;","ease":"Back.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" style="z-index: 0;">
                            </div>
                            <!-- end shape layer -->
                            <!-- start row zone layer -->
                            <div id="rrzm_638-{{$slider?->hashid()}}" class="rev_row_zone rev_row_zone_middle">
                                <!-- start row layer -->
                                <div class="tp-caption  " id="slide-{{$slider?->hashid()}}-layer-04"
                                     data-x="['left','left','left','left']"
                                     data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']"
                                     data-voffset="['-426','-426','-426','-426']" data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap" data-type="row" data-columnbreak="3"
                                     data-responsive_offset="on" data-responsive="off"
                                     data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]" data-paddingright="[100,75,50,30]"
                                     data-paddingbottom="[0,0,0,0]" data-paddingleft="[100,75,50,30]">
                                    <!-- start column layer -->
                                    <div class="tp-caption" id="slide-{{$slider?->hashid()}}-layer-05"
                                         data-x="['left','left','left','left']"
                                         data-hoffset="['100','100','100','100']" data-y="['top','top','top','top']"
                                         data-voffset="['100','100','100','100']" data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap" data-type="column" data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                         data-columnwidth="100%" data-verticalalign="top"
                                         data-textAlign="['center','center','center','center']">
                                        <!-- start subtitle layer -->
                                        <div class="tp-caption mx-auto text-uppercase"
                                             id="slide-{{$slider?->hashid()}}-layer-06"
                                             data-x="['center','center','center','center']"
                                             data-hoffset="['0','0','0','0']"
                                             data-y="['middle','middle','middle','middle']"
                                             data-voffset="['0','0','0','0']" data-fontsize="['13','13','13','13']"
                                             data-lineheight="['20','20','20','20']"
                                             data-fontweight="['500','500','500','500']"
                                             data-letterspacing="['1','1','1','1']"
                                             data-color="['#ffffff','#ffffff','#ffffff','#ffffff']"
                                             data-width="['800','auto','auto','auto']" data-height="auto"
                                             data-whitespace="normal" data-basealign="grid" data-type="text"
                                             data-responsive_offset="off" data-verticalalign="middle"
                                             data-responsive="off"
                                             data-frames='[{"delay":2500,"speed":800,"frame":"0","from":"y:-50px;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"power3.inOut"}]'
                                             data-textAlign="['center','center','center','center']"
                                             data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[25,25,10,10]" data-paddingleft="[0,0,0,0]"
                                             style="word-break: initial;">
                                            <i class="bi bi-award pe-5px icon-small"></i>Sağlıklı Beslenme, Mutlu
                                            Yaşam
                                        </div>
                                        <!-- end subtitle layer -->
                                        <!-- start title layer -->
                                        <div class="tp-caption mx-auto" id="slide-{{$slider?->hashid()}}-layer-07"
                                             data-x="['center','center','center','center']"
                                             data-hoffset="['0','0','0','0']"
                                             data-y="['middle','middle','middle','middle']"
                                             data-voffset="['0','0','0','0']" data-fontsize="['75','60','70','50']"
                                             data-lineheight="['70','65','75','55']"
                                             data-fontweight="['700','700','700','700']"
                                             data-letterspacing="['-2','-2','-2','0']"
                                             data-color="['#ffffff','#ffffff','#ffffff','#ffffff']"
                                             data-width="['700','600','600','auto']" data-height="auto"
                                             data-whitespace="normal" data-basealign="grid" data-type="text"
                                             data-responsive_offset="off" data-verticalalign="middle"
                                             data-responsive="on"
                                             data-frames='[{"delay":"1500","split":"chars","splitdelay":0.03,"speed":800,"split_direction":"middletoedge","frame":"0","from":"x:50px;opacity:0;fb:10px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":100,"frame":"999","to":"opacity:0;fb:0;","ease":"Power4.easeOut"}]'
                                             data-textAlign="['center','center','center','center']"
                                             data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[33,28,35,25]" data-paddingleft="[0,0,0,0]"
                                             style="word-break: initial; text-shadow: #0b1236 3px 3px 15px;">
                                            {{$slider?->title}}
                                        </div>
                                        <!-- end title layer -->
                                        <!-- start text layer -->
                                        <div class="tp-caption mx-auto" id="slide-{{$slider?->hashid()}}-layer-08"
                                             data-x="['center','center','center','center']"
                                             data-hoffset="['0','0','0','0']"
                                             data-y="['middle','middle','middle','middle']"
                                             data-voffset="['0','0','0','0']" data-fontsize="['20','20','24','20']"
                                             data-lineheight="['36','36','40','30']"
                                             data-fontweight="['300','300','300','300']"
                                             data-letterspacing="['0','0','0','0']"
                                             data-color="['#ffffff','#ffffff','#ffffff','#ffffff']"
                                             data-width="['500','500','auto','auto']" data-height="auto"
                                             data-whitespace="normal" data-basealign="grid" data-type="text"
                                             data-responsive_offset="off" data-verticalalign="middle"
                                             data-responsive="on"
                                             data-frames='[{"delay":2500,"speed":800,"frame":"0","from":"y:50px;opacity:0;fb:20px;","to":"o:0.6;fb:0;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"power3.inOut"}]'
                                             data-textAlign="['center','center','center','center']"
                                             data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[36,36,60,40]" data-paddingleft="[0,0,0,0]">
                                            {{$slider?->description ?? ''}}
                                        </div>
                                        <!-- end text layer -->
                                        <!-- start button layer -->
                                        <div class="tp-caption tp-resizeme"
                                             id="slide-{{$slider?->hashid()}}-layer-09"
                                             data-x="['center','center','center','center']"
                                             data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
                                             data-voffset="['0','0','0','0']" data-width="auto" data-height="none"
                                             data-whitespace="nowrap" data-fontsize="['18','16','16','16']"
                                             data-lineheight="['70','55','55','55']" data-type="text"
                                             data-responsive_offset="off" data-responsive="off"
                                             data-frames='[{"delay":3000,"speed":1000,"frame":"0","from":"y:100px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                             data-textAlign="['inherit','inherit','inherit','inherit']"
                                             data-paddingtop="[0,0,0,0]" data-paddingright="[75,70,65,60]"
                                             data-paddingbottom="[0,0,0,0]" data-paddingleft="[45,35,30,30]">
                                            <a href="#"
                                               class="btn btn-extra-large get-started-btn btn-rounded with-rounded btn-gradient-flamingo-amethyst-green btn-box-shadow">
                                                Hemen Randevu Al
                                                <span class="bg-white text-base-color"><i
                                                        class="fa-solid fa-arrow-right"></i></span></a>
                                        </div>
                                        <!-- end button layer -->
                                    </div>
                                    <!-- end column layer -->
                                </div>
                                <!-- end row layer -->
                            </div>
                            <!-- end row zone layer -->
                            <!-- start beige background layer -->
                            <div
                                class="tp-caption tp-shape tp-shapewrapper tp-resizeme bg-base-color border-radius-50"
                                id="slide-{{$slider?->hashid()}}-layer-10"
                                data-x="['center','center','center','center']"
                                data-hoffset="['510','410','310','0']"
                                data-y="['middle','middle','middle','middle']"
                                data-voffset="['-320','-250','-250','0']" data-width="['122','122','120','120']"
                                data-height="['122','122','120','120']" data-visibility="['on','on','off','off']"
                                data-whitespace="nowrap" data-basealign="grid" data-type="shape"
                                data-responsive_offset="on"
                                data-frames='[{"delay":3500,"speed":1000,"frame":"0","from":"x:0px;y:50px;rX:0deg;rY:0deg;rZ:0deg;sX:0.5;sY:0.5;opacity:0;","to":"o:1;","ease":"Back.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]" style="z-index: 0;">
                            </div>
                            <!-- end beige background layer -->
                            <!-- start beige text layer -->
                            <div class="tp-caption d-inline-block" id="slide-{{$slider?->hashid()}}-layer-11"
                                 data-x="['center','center','center','center']"
                                 data-hoffset="['510','410','310','0']"
                                 data-y="['middle','middle','middle','middle']"
                                 data-voffset="['-305','-250','-250','0']"
                                 data-visibility="['on','on','off','off']" data-fontsize="['13','13','13','13']"
                                 data-lineheight="['16','16','16','16']" data-fontweight="['500','600','600','600']"
                                 data-letterspacing="['0','0','0','0']"
                                 data-color="['#ffffff','#ffffff','#ffffff','#ffffff']"
                                 data-width="['100','100','100','100']" data-height="auto" data-whitespace="normal"
                                 data-basealign="grid" data-type="text" data-responsive_offset="on"
                                 data-verticalalign="middle" data-responsive="on"
                                 data-frames='[{"delay":3700,"speed":1000,"frame":"0","from":"x:0px;y:50px;rX:0deg;rY:0deg;rZ:0deg;sX:0.5;sY:0.5;opacity:0;","to":"o:1;","ease":"Back.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                 data-paddingright="[0,0,0,0]" data-paddingbottom="[33,0,0,0]"
                                 data-paddingleft="[0,0,0,0]" style="word-break: initial;">
                                <i class="bi bi-patch-check-fill icon-extra-medium d-block pb-10px"></i> <span
                                    class="d-block text-uppercase">Uzman Diyetisyen</span>
                            </div>
                            <!-- end beige text layer -->
                        </li>
                    @endforeach
                </ul>
                <div class="tp-bannertimer"
                     style="height: 10px; background-color: rgba(0, 0, 0, 0.10); z-index: 98"></div>
            </div>
        </div>
    </section>
</div>
@push('script')
    <!-- Slider's main "init" script -->
    <script>
        $(document).ready(function($) {
            var revapi7;

            if (typeof $.fn.revolution === 'undefined') {
                revslider_showDoubleJqueryError("#demo-dietitian-slider");
                return;
            }

            revapi7 = $("#demo-dietitian-slider").show().revolution({
                sliderType: "standard",
                delay: 9000,
                sliderLayout: 'fullscreen',
                autoHeight: 'off',
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                navigation: {
                    keyboardNavigation: 'on',
                    keyboard_direction: 'horizontal',
                    mouseScrollNavigation: 'off',
                    mouseScrollReverse: 'reverse',
                    onHoverStop: 'off',
                    arrows: {
                        enable: true,
                        style: 'hesperiden',
                        rtl: false,
                        hide_onleave: false,
                        hide_onmobile: true,
                        hide_under: 500,
                        hide_over: 9999,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        left: {
                            container: 'slider',
                            h_align: 'left',
                            v_align: 'center',
                            h_offset: 50,
                            v_offset: 0
                        },
                        right: {
                            container: 'slider',
                            h_align: 'right',
                            v_align: 'center',
                            h_offset: 50,
                            v_offset: 0
                        }
                    },
                    bullets: {
                        enable: true,
                        style: 'hermes',
                        tmp: '',
                        direction: 'horizontal',
                        rtl: false,
                        container: 'layergrid',
                        h_align: 'center',
                        v_align: 'bottom',
                        h_offset: 0,
                        v_offset: 30,
                        space: 12,
                        hide_onleave: false,
                        hide_onmobile: true,
                        hide_under: 0,
                        hide_over: 500,
                        hide_delay: true,
                        hide_delay_mobile: 500
                    },
                    touch: {
                        touchenabled: 'on',
                        touchOnDesktop: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: 'horizontal',
                        drag_block_vertical: true
                    }
                },
                responsiveLevels: [1240, 1024, 768, 480],
                visibilityLevels: [1240, 1024, 768, 480],
                gridwidth: [1240, 1024, 768, 480],
                gridheight: [930, 850, 900, 850],
                lazyType: "smart",
                spinner: "spinner0",
                parallax: {
                    type: "scroll",
                    origo: "slidercenter",
                    speed: 400,
                    levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 5],
                },
                shadow: 0,
                shuffle: "off",
                fullScreenAutoWidth: "on",
                fullScreenAlignForce: "on",
                fullScreenOffsetContainer: "nav",
                fullScreenOffset: "",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        });
    </script>
@endpush
