@extends('front.layouts.base')
@section('content')
    <!-- start section -->
    <section id='down-section mt-2'>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2 md-mb-50px" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <h4 class="text-dark-gray fw-700 alt-font mb-20px d-block">{{$service?->name ?? ''}}</h4>
                    <p>{{$service?->description ?? ''}}</p>
                    <img src="{{$service?->getFirstMediaUrl('images', 'small')}}" class="mt-30px md-mt-15px mb-60px md-mb-40px border-radius-6px" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
@endsection
