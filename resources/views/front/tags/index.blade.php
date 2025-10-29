@extends('front.layouts.base')
@section('page-title', ucfirst($tag?->name) ?? '')
@push('styles')
    <style>
        .blog-name {
            white-space: nowrap;
        !important;
            overflow: hidden;
        !important;
            text-overflow: ellipsis;
        !important;
        }
    </style>
@endpush
@section('content')
    <section class="ipad-top-space-margin md-pt-0">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-12 text-center appear anime-child anime-complete"
                     data-anime="{ &quot;el&quot;: &quot;childs&quot;, &quot;translateY&quot;: [30, 0], &quot;opacity&quot;: [0,1], &quot;duration&quot;: 600, &quot;delay&quot;: 0, &quot;staggervalue&quot;: 300, &quot;easing&quot;: &quot;easeOutQuad&quot; }">
                    <h2 class="text-dark-gray fs-1 fw-700 ls-minus-1px">{{ucfirst($tag?->name) ?? ''}}</h2>
                    <div class="mt-auto justify-content-start breadcrumb breadcrumb-style-01 fs-14 text-dark-gray">
                        <ul>
                            <li><a href="{{route('home')}}"
                                   class="text-dark-gray text-dark-gray-hover">Anasayfa</a></li>
                            <li><a href="{{route('tags.show', ['tag' => $tag?->slug])}}"
                                   class="text-dark-gray fw-bold text-dark-gray-hover">{{ucfirst($tag?->name ?? '')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="blog-side-image portfolio-wrapper grid-loading grid grid-3col xxl-grid-2col xl-grid-2col lg-grid-2col md-grid-1col sm-grid-1col xs-grid-1col gutter-extra-large">
                        @foreach($blogs as $blog)
                            <li class="grid-sizer"></li>
                            <li class="grid-item blog-item mb-5">
                                <div
                                    class="blog-box d-md-flex d-block flex-row h-100 border-radius-6px overflow-hidden box-shadow-extra-large">
                                    <div class="blog-image w-50 sm-w-100 cover-background"
                                         style="background-image: url('{{ $blog->getFirstMediaUrl('blog', 'cover_image') ?: 'https://placehold.co/800x923' }}')">
                                        <a href="{{ route('blogs.show', ['blog' => $blog->slug]) }}"></a>
                                    </div>
                                    <div
                                        class="blog-content w-50 sm-w-100 pt-50px pb-40px ps-40px pe-40px xl-p-30px bg-white d-flex flex-column justify-content-center align-items-start last-paragraph-no-margin">
                                        <a href="#"
                                           class="categories-btn bg-dark-gray text-white text-uppercase fw-500 mb-30px"
                                           data-filter=".category-{{$blog->category_id }}">
                                            {{ $blog->category?->name ?? '' }}
                                        </a>

                                        <a data-bs-toggle="tooltip" data-bs-placement="top"
                                           data-bs-title="{{$blog?->name ?? ''}}"
                                           href="{{ route('blogs.show', ['blog' => $blog->slug]) }}"
                                           class="card-title text-dark-gray text-dark-gray-hover mb-5px fw-600 fs-18 lh-28">{{$blog?->name_formatted ?? ''}}</a>

                                        <p data-bs-toggle="tooltip" data-bs-placement="top"
                                           data-bs-title="{{$blog?->description ?? ''}}"
                                           title="{{$blog?->description ?? ''}}">{{ $blog?->description_formatted }}</p>

                                        <div class="mt-15px">
                                            <span class="separator bg-dark-gray"></span>
                                            <a href="{{ route('blogs.show', ['blog' => $blog->slug]) }}"
                                               class="text-dark-gray text-dark-gray-hover d-inline-block fs-15 fw-500 fw-500">{{auth()?->user()?->name ?? ''}}</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
