@extends('layouts.main')
@section('_title')
    | {{ $project->name }}
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
@section('_content')
    <div class="page-title">
        <div class="container-fluid">
            <div class="row">
                <div class="inner-title">
                    <div class="overlay-image"></div>
                    <div class="banner-title">
                        <div class="page-title-heading">
                            {{ $project->name }}
                        </div>
                        <div class="page-title-content link-style6">
                            <span><a class="home" href="{{ route('home') }}">Ana Səhifə</a></span>
                            <span><a class="home" href="{{ route('projects') }}">Lahiyələr</a></span>
                            <span class="page-title-content-inner">{{ $project->name }}</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /.page-title -->

    <section class="flat-case-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-heading-jost-size46 fw-500 text-pri2-color center mg-bottom-50 ">{{ $project->name }}</h3>

                    @if (count($project->gallery) > 0)
                        <div class="slickcorusel">
                            <div class="slider-for">
                                <div class="item">
                                    {{-- <a data-fancybox="gallery" class="fancygallery" href="{{ _asset(_img($project->avatar)) }}"> --}}
                                    <img src="{{ _img($project->avatar) }}" alt="{{ $project->name }}" draggable="false" />
                                    {{-- </a> --}}
                                </div>
                                @foreach ($project->gallery as $image)
                                    <div class="item">
                                        <a data-fancybox="gallery" class="fancygallery" href="{{ _asset(_img($image->image)) }}">
                                            <img src="{{ _img($image->image) }}" alt="{{ $project->name }}" draggable="false" />
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                            <div class="slider-nav" style="margin-top:20px;height: 200px;">
                                <div class="item">
                                    <img src="{{ _img($project->avatar) }}" alt="{{ $project->name }}" draggable="false" />
                                </div>
                                @foreach ($project->gallery as $image)
                                    <div class="item">
                                        <img src="{{ _img($image->image) }}" alt="{{ $project->name }}" draggable="false" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="post-case-details" style="width: 100%;height: 500px;">
                            <img style="width: 100%;height: 100%; object-fit: contain" style="width: 50%;display: block;margin: auto" src="{{ _img($project->avatar) }}" alt="{{ $project->name }}">
                        </div>
                    @endif

                </div>
                {{-- <div class="col-md-6">
                    <div class="projects-box mg-bottom-35 wow fadeInLeft">
                        <div class="features-box">
                            <span class="tf-icon icon-Group-660"><span class="ripple"></span></span>
                            <div class="content-features">
                                <a href="#">
                                    <h3 class="section-heading-jost-size28 mg-bottom-8">Company Gather.</h3>
                                </a>
                                <p class="section-desc">Lorem Ipsum is simply dummy available typesetting industry been the industry standard Lorem Ipsum</p>
                            </div>
                        </div>
                        <div class="post-inner-box">
                            <img src="images/projects/close-up-planting-flowers-pot.jpg" alt="images">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="projects-box mg-bottom-35 wow fadeInLeft">
                        <div class="features-box">
                            <span class="tf-icon icon-admin-sys"><span class="ripple"></span></span>
                            <div class="content-features">
                                <a href="#">
                                    <h3 class="section-heading-jost-size28 mg-bottom-8">Company Details. </h3>
                                </a>
                                <p class="section-desc">Lorem Ipsum is simply dummy text free available typesetting industry been the industry simply </p>
                            </div>
                        </div>
                        <div class="post-inner-box">
                            <img src="images/projects/portrait-smiling-young-woman-holding-colorful-petunias-wooden-crate.jpg" alt="images">
                        </div>
                    </div>
                </div> --}}

                <div class="col-md-12 " style="color: #000 !important">
                    {!! $project->content !!}
                    <div class="themesflat-spacer clearfix" data-desktop="75" data-mobile="30" data-smobile="30"></div>
                </div>
                {{-- <div class="col-md-3">
                    <div class="author-post">
                        <img src="images/projects/portrait-woman-gardening.jpg" alt="images">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="author-note bd-radius-8">
                        <h4 class="author-name section-heading-rubik-size16 fw-500 text-pri2-color">D.JHON SHIKON</h4>
                        <p class="author-desc">Lorem Ipsum is simply dummy text of free available in market the printing and typesetting industry has been the industry's standard dummy text ever.</p>
                    </div>
                </div> --}}
                {{-- <div class="col-md-12">
                    <div class="post-tags-socials">
                        <div class="post-tags">
                            <span class="section-heading-rubik-size18 text-pri-color mg-right-15">Tag:</span>
                            <a class="section-heading-rubik-size12 fw-500" href="#">design</a>
                            <a class="section-heading-rubik-size12 fw-500" href="#">ui/ux design</a>
                            <a class="section-heading-rubik-size12 fw-500" href="#">graphics</a>
                            <a class="section-heading-rubik-size12 fw-500" href="#">icon</a>
                        </div>
                        <div class="post-socials ">
                            <a href="#" class="skype"><span class="fa fa-skype"></span></a>
                            <a href="#" class="facebook"><span class="fa fa-facebook"></span></a>
                            <a href="#" class="instagram"><span class="fa fa-instagram"></span></a>
                            <a href="#" class="twitter"><span class="fa fa-twitter"></span></a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
