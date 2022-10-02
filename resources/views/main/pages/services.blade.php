@extends('layouts.main')
@section('_title')
| Xidmətlər
@endsection
@section('_content')
    <!-- page title -->
    <div class="page-title">
        <div class="container-fluid">
            <div class="row">
                <div class="inner-title">
                    <div class="overlay-image"></div>
                    <div class="banner-title">
                        <div class="page-title-heading">
                            Services
                        </div>
                        <div class="page-title-content link-style6">
                            <span><a class="home" href="{{ route('home') }}">Ana Səhifə</a></span><span class="page-title-content-inner">Xidmətlər</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /.page-title -->

    <!-- Our services -->
    <section class="flat-why-choose-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="120" data-mobile="60" data-smobile="60"></div>
                </div>
            </div>
            <div class="row">

                @php
                    $count = 1;
                @endphp
                @foreach ($services as $service)
                    @php
                        if ($count == 4) {
                            $count = 1;
                        }
                    @endphp
                    <div id="{{ $count }}" class="item-three-column mg-bottom-60 wow  
                        @if ($count == 1) fadeInLeft
                        @elseif ($count == 2) fadeInUp
                        @elseif ($count == 3) fadeInRight @endif
                    ">
                        <article class="flat-WCU-box grow-up-hover">
                            <div class="WCU-image">
                                <img class="grow-up-hover" src="{{ _img($service->avatar) }}" alt="{{ $service->name }}">
                            </div>
                            <div class="features-box">
                                <span class="tf-icon icon2 icon-hanging-bot"></span>
                                <div class="content-features">
                                    <a href="{{ route('service', $service->slug) }}">
                                        <h3 class="section-heading-rubik-size20">{{ $service->name }}</h3>
                                    </a>
                                    <h6 class="section-desc" style="word-break: break-word"> {{  Str::limit(strip_tags(html_entity_decode($service->content)), 50)  }}</h6>
                                </div>
                            </div>
                            <div class="button-read-more link-style2">
                                <a href="{{ route('service', $service->slug) }}" class="read-more btn-read-more">Ətraflı</a>
                            </div>
                        </article>
                    </div>
                    @php
                        $count++;
                    @endphp
                @endforeach
                <div class="row ">
                    <div class="col-lg-12  ">
                        <div class="themesflat-pagination clearfix">
                            {{ $services->links() }}
                        </div>
                    </div>
                </div>
                {{-- <div class="item-three-column mg-bottom-60 wow fadeInRight">
                    <article class="flat-WCU-box grow-up-hover">
                        <div class="WCU-image">
                            <img class="grow-up-hover" src="images/why-choose-us/artical-post-3.jpg" alt="images">
                        </div>
                        <div class="features-box">
                            <span class="tf-icon icon3 icon-spray"></span>
                            <div class="content-features">
                                <a href="{{ route('service',$service->slug)}}">
                                    <h3 class="section-heading-rubik-size20">Lawn Maintenance</h3>
                                </a>
                                <h6 class="section-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at est id leo</h6>
                            </div>
                        </div>
                        <div class="button-read-more link-style2">
                            <a href="{{ route('service',$service->slug)}}" class="read-more btn-read-more">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="item-three-column mg-bottom-60 wow fadeInLeft">
                    <article class="flat-WCU-box grow-up-hover">
                        <div class="WCU-image">
                            <img class="grow-up-hover" src="images/why-choose-us/artical-post-1.jpg" alt="images">
                        </div>
                        <div class="features-box">
                            <span class="tf-icon icon-fruit-box"></span>
                            <div class="content-features">
                                <a href="{{ route('service',$service->slug)}}">
                                    <h3 class="section-heading-rubik-size20">Landscaping</h3>
                                </a>
                                <h6 class="section-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at est id leo</h6>
                            </div>
                        </div>
                        <div class="button-read-more link-style2">
                            <a href="{{ route('service',$service->slug)}}" class="read-more btn-read-more">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="item-three-column mg-bottom-60 wow fadeInUp">
                    <article class="flat-WCU-box grow-up-hover">
                        <div class="WCU-image">
                            <img class="grow-up-hover" src="images/why-choose-us/artical-post-2.jpg" alt="images">
                        </div>
                        <div class="features-box">
                            <span class="tf-icon icon2 icon-hanging-bot"></span>
                            <div class="content-features">
                                <a href="{{ route('service',$service->slug)}}">
                                    <h3 class="section-heading-rubik-size20">Pruning plants</h3>
                                </a>
                                <h6 class="section-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at est id leo</h6>
                            </div>
                        </div>
                        <div class="button-read-more link-style2">
                            <a href="{{ route('service',$service->slug)}}" class="read-more btn-read-more">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="item-three-column mg-bottom-60 wow fadeInRight">
                    <article class="flat-WCU-box grow-up-hover">
                        <div class="WCU-image">
                            <img class="grow-up-hover" src="images/why-choose-us/artical-post-3.jpg" alt="images">
                        </div>
                        <div class="features-box">
                            <span class="tf-icon icon3 icon-spray"></span>
                            <div class="content-features">
                                <a href="{{ route('service',$service->slug)}}">
                                    <h3 class="section-heading-rubik-size20">Lawn Maintenance</h3>
                                </a>
                                <h6 class="section-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at est id leo</h6>
                            </div>
                        </div>
                        <div class="button-read-more link-style2">
                            <a href="{{ route('service',$service->slug)}}" class="read-more btn-read-more">Read More</a>
                        </div>
                    </article>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="120" data-mobile="100" data-smobile="100"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Our service -->
@endsection
