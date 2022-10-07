@extends('layouts.main')
@section('_content')
    <!-- page title -->
    <div class="page-title-home1">
        <!-- slider -->
        <div class="container">
            <div class="row">
                <!-- <div class="overlay-image"></div> -->

                <div class="inner-title-home1">
                    <!-- /.page-title -->
                    <div class="flat-slider clearfix">
                        <div class="rev_slider_wrapper fullwidthbanner-container">
                            <div id="rev-slider2" class="rev_slider fullwidthabanner">
                                <ul>
                                    @foreach ($sliders as $slider)
                                        <li data-transition="random">
                                            <!-- Main Image -->
                                            <!-- Layers -->
                                            @if (!is_null($slider->content))
                                                <div class="tp-caption tp-resizeme text-two" data-x="['left','left','left','center']" data-hoffset="['-2','-2','5','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-130','-165', '-15','-15']" data-fontsize="['60','70','50','60']" data-lineheight="['70','80','64','48']" data-width="full" data-height="none" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="700" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                                                    <div class="title-box">
                                                        <h2 class="title-slider text-pri2-color">{!! $slider->content !!}</h2>
                                                    </div>
                                                </div>
                                            @endif
                                            @if (!is_null($slider->link))
                                                <div class="tp-caption btn-text btn-linear hv-linear-gradient" data-x="['left','left','left','center']" data-hoffset="['-3','-3','5','0']" data-y="['middle','middle','middle','middle']" data-voffset="['48','40','180','280']" data-width="full" data-height="none" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="700" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                                                    <div class="button-box">
                                                        <div class="button res-btn-slider">
                                                            <a href="{{ $slider->link }}" class="btn btn-left">
                                                                @if (!is_null($slider->button))
                                                                    {{ $slider->button }}
                                                                @else
                                                                    Ətraflı
                                                                @endif
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="tp-caption tp-resizeme image-slider text-right " data-x="['right','right','right','right']" data-hoffset="['-29','-29','-150','-29']" data-y="['center','center','center','center']" data-voffset="['-88','-88','60','-88']" data-width="full" data-height="none" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:0px;y:[100%];" data-mask_out="x:inherit;y:inherit;" data-start="800" data-splitin="none" data-splitout="none" data-responsive_offset="on">
                                                <img class="img-slide wow jackInTheBox" data-wow-delay="2500ms" data-wow-duration="3s" src="{{ _img($slider->photo) }}" alt="images">
                                            </div>
                                        </li>
                                    @endforeach
                                    <!-- /End Slide 1 -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- flat-slider -->
                </div>

            </div>

        </div>
        <!-- .slider -->

    </div>
    <!-- /.page-title -->
  
    <!-- about -->
    <section class="flat-about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="121" data-mobile="60" data-smobile="60">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-post center bd-radius-50-image">
                        <img class="main-post-about" src="{{ _frontStaticImg('home/the-girl-in-the-glasses.jpg') }}" alt="About">
                        <img class="circel-inside" src="{{ _frontStaticImg('home/circle-about.png') }}" alt="images">
                        <div class="about-count-box themesflat-counter">
                            <div class="box">
                                <div class="inner-about-count-box">
                                    <span class="number-count number" data-speed="1500" data-to="{{ _about('workyear') }}" data-inviewport="yes"></span>
                                    <div class="caption-number-count">
                                        İlin Təcrübəsi
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="about-content-title wow fadeInUp">
                            <div class="section-subtitle">Haqqımızda</div>
                            <div class="section-title">Biz kimik?</div>
                            <div class="section-desc">{{ _about('aboutus') }} </div>
                        </div>
                        <div id="about-box" class="about-desc-box">
                            <div class="about-desc">
                                <div class="about-box-nd1 wow fadeInLeft">
                                    <span class="tf-icon icon-Group-660"></span>
                                    <div class="inner-box">
                                        <a href="{{ route('services') }}">
                                            <h3 class="section-heading-jost-size20 item-1">Xidmətlərimiz</h3>
                                        </a>
                                        {{-- <p class="section-desc">Lorem Ipsum is simply</p> --}}
                                    </div>
                                </div>
                                <div class="about-box-nd1 wow fadeInLeft" style="width: 100% !important">
                                    <span class="tf-icon icon-Group-661"></span>
                                    <div class="inner-box">
                                        <a href="{{ route('projects') }}">
                                            <h3 class="section-heading-jost-size20 item-2">Gördüyümüz İşlər</h3>
                                        </a>
                                        {{-- <p class="section-desc">
                                            Lorem Ipsum is simply</p> --}}
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="image-desc">
                                <img class="image" src="{{ _frontStaticImg('home/box-flowers-green-garden.jpg') }}" alt="images">
                            </div> --}}
                        </div>
                        <div class="button hover-up d-flex justify-content-end">
                            <a href="{{ route('contact') }}" class="btn2 d-block">Əlaqə</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /about -->

    <!-- Our services -->
    <section class="flat-services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-box">
                        {{-- <h4 class="section-subtitle">Xidmətlərimiz</h4> --}}
                        {{-- <h2 class="section-title">Gördüyümüz işlər</h2> --}}
                        <h2 class="section-title">Xidmətlərimiz</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="67" data-mobile="60" data-smobile="60">
                    </div>
                </div>

                @foreach ($services as $service)
                    <div class="item-four-column">
                        <div class="our-services-box hover-up-style2 mg-bottom30 wow fadeInDown">
                            <div class="our-services-overlay"></div>
                            <span class="tf-icon icon-size icon-icon-farming-layer">
                                <img src="{{ _frontStaticImg('logo-150.png') }}" alt="">
                            </span>
                            <div class="content-features">
                                <a href="{{ route('service', $service->slug) }}">
                                    <h3 class="section-heading-jost-size22">{{ $service->name }}</h3>
                                </a>
                                <p class="section-desc" style="word-break: break-all">
                                    {{ substr($service->shortcontent, 0, 150) }}
                                </p>
                                <div class="link2 link-style2">
                                    <a href="{{ route('service', $service->slug) }}" class="read-more">
                                        Ətraflı
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="flat-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 50px;">
                    <div class="col-lg-8 col-sm-6">
                        <div class="section-title-box">
                            <h2 class="section-title">Məhsullarımız</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="button-news mg-top-20">
                            <a href="product.html" class="button-style-2 btn-2 f-right">Hamısı</a>
                        </div>
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="65" data-mobile="60" data-smobile="40">
                    </div>
                </div>
                @foreach ($products as $product)
                    <div class="col-md-3">
                        <ul class="tf-shop-item wow fadeInDown">

                            <li>
                                <div class="shop-item-box">
                                    {{-- <div class="product-labels labels-rounded">
                                        <span class="attribute-label product-label label-with-img">
                                            <img src="https://shop.pitomnik-sochi.ru/wp-content/uploads/2020/08/5.svg" title="5" alt="5">
                                        </span>
                                        <span class="attribute-label product-label label-with-img">
                                            <img src="https://shop.pitomnik-sochi.ru/wp-content/uploads/2020/09/06–08.svg" title="06-08-m" alt="06-08-m">
                                        </span>
                                        <span class="attribute-label product-label label-with-img">
                                            <img src="https://shop.pitomnik-sochi.ru/wp-content/uploads/2020/09/04-06.svg" title="04-06-m" alt="04-06-m">
                                        </span>
                                    </div> --}}
                                    <div class="image-item">
                                        <img src="{{ _img($product->avatar) }}" alt="{{ $product->fullname }}">
                                    </div>
                                    <div class="content-item">
                                        <a href="{{ route('product', $product->slug) }}" class="section-heading-jost-size20">{{ $product->name }}</a>
                                        {{-- <div class="price-item">$12.00</div> --}}
                                    </div>
                                </div>
                                <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="25" data-smobile="15"></div>
                            </li>

                        </ul>
                    </div>
                @endforeach
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="118" data-mobile="0" data-smobile="0">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /shop home2 -->

    <!-- counter-->
    <section class="flat-counter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="120" data-mobile="60" data-smobile="60">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="counter-content-left wow fadeInLeft">
                        <img class="background-counter" src="{{ _frontStaticImg('Counter/the-man-working-tree.jpg') }}" alt="images">
                        {{-- <div class="content-left-box">
                            <h2 class="title-main">We are nice people with a lot of experience.</h2>
                            <p class="section-desc">Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex
                                nymphs. Waltz, bad nymph</p>
                        </div> --}}
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="30" data-smobile="30">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter-content-right themesflat-counter wow fadeInRight">
                        <div class="content-right-box mg-bottom30">
                            <span class="title-main white number" data-speed="1000" data-to="{{ _about('workyear') }}" data-inviewport="yes"></span><span class="title-main white"> İldən</span>
                            <h3 class="section-heading-jost-size20 fw-600"> Artıq İş Təcrübəsi</h3>
                        </div>
                        <div class="content-right-box box-2 mg-bottom30">
                            <span class="title-main white number" data-speed="1000" data-to="{{ _about('customer') }}" data-inviewport="yes"></span><span class="title-main white"></span>
                            <h3 class="section-heading-jost-size20 fw-600">Müstəri</h3>
                        </div>
                        <div class="content-right-box box-3">
                            <span class="title-main white number" data-speed="2000" data-to="{{ _about('satisfaction') }}" data-inviewport="yes"></span><span class="title-main white">%</span>
                            <h3 class="section-heading-jost-size20 mg-top-5 fw-600">Məmnuniyyət</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="120" data-mobile="60" data-smobile="60">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /conter -->

    <!-- Our team -->
    <section class="flat-team">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-box">
                        <h4 class="section-subtitle white wow fadeInUp">Komandamımız Tanıyın</h4>
                        <h2 class="section-title white wow fadeInUp">Bizim yaradıcı Komandamız</h2>
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="60">
                    </div>
                </div>
            </div>
        </div>
        <!-- list team -->
        <div class="container">
            <div class="row">
                <div class="list-team">
                    @foreach ($personals as $personal)
                        <div class="item-three-column" style="margin-bottom: 15px">
                            <div class="team-box wow fadeInUp">
                                <div class="image-staff" style="height: 350px;">
                                    <div class="backround-overlay"></div>
                                    <div class="list-icon-hidden">
                                        <ul class="widgets-nav-social link-style3">
                                            <li><a href="{{ $personal->linkedin }}"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                            <li><a href="{{ $personal->facebook }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="{{ $personal->twitter }}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <img style="height: 100%;width: 100%;object-fit: cover" src="{{ _img($personal->image) }}" alt="{{ $personal->fullname }}">
                                </div>
                                <div class="info-staff link-style4">
                                    <h3 class="section-heading-rubik-size20"> {{ $personal->fullname }} </h3>
                                    <p class="section-desc-2 white"> {{ $personal->position }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- /Our team -->
    <section class="flat-blog-home01">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-6">
                    <div class="section-title-box">
                        <h2 class="section-title">Tərəfdaşlar</h2>
                    </div>
                </div>
              
                <div class="col-md-12">
                    <div class="slide-blog-content">
                        <div class="owl-carousel owl-theme">
                            @foreach ($partners as $partner)
                                <div class="item wow fadeInUp">
                                    <div class="blog-item hover-up-style2" style="background-image: url({{ _img($partner->avatar)}}) !important">
                                        <div class="item-overlay"></div>
                                        <div class="item-box link">
                                            <hr class="line-blog-item">
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="0">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog -->
    <section class="flat-blog-home01">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-6">
                    <div class="section-title-box">
                        <h2 class="section-title">Blog</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="button-news mg-top-20">
                        <a href="{{ route('blogs') }}" class="button-style-2 btn-2 f-right">Bloglar</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="slide-blog-content">
                        <div class="owl-carousel owl-theme">

                            @foreach ($blogs as $blog)
                                <div class="item wow fadeInUp">
                                    <div class="blog-item hover-up-style2">
                                        <div class="item-overlay"></div>
                                        <div class="item-box link">
                                            {{-- <div class="content-info"><a href="blog.html" class="folder">
                                                    Home Gardening
                                                </a></div> --}}
                                            <div class="link-style6">
                                                <div class="content-info margin-top">
                                                    <br>
                                                    <br>
                                                    <br>
                                                </div>
                                                <a href="{{ route('blog', $blog->slug) }}" class="section-heading-jost-size20">
                                                    {{ $blog->name }}
                                                </a>
                                            </div>
                                            <hr class="line-blog-item">

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="0">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /blog -->
@endsection
