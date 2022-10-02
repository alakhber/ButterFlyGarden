@extends('layouts.main')
@section('_title')
    | {{ $product->name }}
@endsection
@section('_styles')
    <link rel="stylesheet" href="https://science.gov.az/front/css/pages/gallery.css">
    <link rel="stylesheet" href="https://science.gov.az/plugins/fancybox/dist/jquery.fancybox.min.css">
    <style>
        .slider-for {
            width: 100%;
            margin: auto;
        }

        .slider-for .slick-prev,
        .slider-for .slick-next {
            background-color: #c4c4c4;
            height: 60px;
            width: 40px;
        }

        .slider-for img {
            width: auto;
            height: 400px;
            margin: auto;
            /*object-fit: contain;*/
        }

        .slider-nav img {
            min-height: 100%;
            height: 150px;
            /* margin-left: 5px; */
            width: 150px;
            object-fit: cover
        }

        .slider-nav img:hover {
            cursor: pointer;
        }

        .slider-nav {
            margin: auto;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            width: 100%;
            height: 200px;
        }

        .slider-nav .item {
            margin: auto;
            width: 80px;
            height: 50px;
            /* margin-top: 5px; */
            margin-left: 10px;
        }

        .slick-arrow {
            position: absolute;
            top: 50%;
            z-index: 50;
        }

        .slick-prev {
            left: 0px;
        }

        .slick-next {
            right: 0;
        }

        .slider-nav .slick-slide {
            opacity: 0.5;
        }

        .slider-nav .slick-slide.slick-active {
            opacity: 1;
        }

        @media only screen and (max-width: 576px) {
            .slider-for img {
                width: 150;
                max-height: 180px;
                object-fit: contain;
            }

            .slider-for {
                height: 180px;
            }

            .slider-nav img {
                height: 50px;
            }
        }

        @media (min-width: 577px) and (max-width: 768px) {
            .slider-for img {
                width: 100%;
                max-height: 300px;
                /* object-fit: contain;*/
            }

            .slider-for {
                height: 30px;
            }
        }
    </style>
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
                            {{ $product->name }}
                        </div>
                        <div class="page-title-content link-style6">
                            <span><a class="home" href="{{ route('home') }}">Ana Səhifə</a></span> |
                            <span><a class="home" href="{{ route('products') }}">Məhullar</a></span>
                            <span class="page-title-content-inner">{{ $product->name }}</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /.page-title -->

    <section class="flat-service-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="117" data-mobile="60" data-smobile="60"></div>
                </div>
                <div class="col-md-12">
                    <article class="content-service-details">
                        <div class="post-service-details bd-radius-8-image ">
                            @if (count($product->gallery) > 0)
                                <div class="slickcorusel">
                                    <div class="slider-for">
                                        <div class="item">
                                            {{-- <a data-fancybox="gallery" class="fancygallery" href="{{ _asset(_img($product->avatar)) }}"> --}}
                                            <img src="{{ _img($product->avatar) }}" alt="{{ $product->name }}" draggable="false" />
                                            {{-- </a> --}}
                                        </div>
                                        @foreach ($product->gallery as $image)
                                            <div class="item">
                                                <a data-fancybox="gallery" class="fancygallery" href="{{ _asset(_img($image->image)) }}">
                                                    <img src="{{ _img($image->image) }}" alt="{{ $product->name }}" draggable="false" />
                                                </a>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="slider-nav" style="margin-top:20px;height: 200px;">
                                        <div class="item">
                                            <img src="{{ _img($product->avatar) }}" alt="{{ $product->name }}" draggable="false" />
                                        </div>
                                        @foreach ($product->gallery as $image)
                                            <div class="item">
                                                <img src="{{ _img($image->image) }}" alt="{{ $product->name }}" draggable="false" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @else
                                <div class="post-service-details bd-radius-8-image mg-bottom-45">
                                    <img src="{{ _img($product->avatar) }}" style="width: 50%;display: block;margin: auto"  alt="{{ $product->name }}">
                                </div>
                            @endif
                            <h2 class="section-heading-jost-size34 text-pri2-color mg-bottom30">{{ $product->name }}</h2>
                            <div class="section-desc mg-bottom-20" style="
                            word-break: break-all;
                        ">{!! $product->content !!}</div>
                    </article>
                </div>
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="172" data-mobile="100" data-smobile="60"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Our service -->
@endsection
@section('_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                fade: true,
                autoplay: false,
                asNavFor: '.slider-nav',
                pauseOnFocus: true,
                pauseOnHover: true,
            });
            $('.slider-nav').slick({
                autoplay: false,
                slidesToShow: 6,
                slidesToScroll: 6,
                asNavFor: '.slider-for',
                centerMode: false,
                focusOnSelect: true,
                arrows: false,
                pauseOnFocus: true,
                pauseOnHover: true,
                infinite: false

            });
            $('.fancygallery').fancybox({
                buttons: ['zoom', 'thumbs', 'close']
            });

            var resize = new Array('.resizable-h2', '.resizable-text');
            resize = resize.join(',');

            var resetFont = $(resize).css('font-size');
            $("#normalize-btn").click(function() {
                $('.resizable-h2').css('font-size', '22px');
                $('.resizable-text').css('font-size', '0.9rem');
            });

            $("#increase-btn").click(function() {
                var originalFontSize = $(resize).css('font-size');
                var originalFontNumber = parseFloat(originalFontSize, 10);
                if (originalFontNumber <= 28) {
                    var newFontSize = originalFontNumber * 1.2;
                    $(resize).css('font-size', newFontSize);
                }
                return false;
            });

            $("#decrease-btn").click(function() {
                var originalFontSize = $(resize).css('font-size');
                var originalFontNumber = parseFloat(originalFontSize, 10);
                if (originalFontNumber >= 16) {
                    var newFontSize = originalFontNumber * 0.8;
                    $(resize).css('font-size', newFontSize);
                }
                return false;
            });
        });
    </script>
@endsection
