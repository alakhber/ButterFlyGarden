@extends('layouts.main')
@section('_title')
| Bloglar
@endsection
@section('_content')
<div class="page-title">
    <div class="container-fluid">
        <div class="row">
            <div class="inner-title">
                <div class="overlay-image"></div>
                <div class="banner-title">
                    <div class="page-title-heading">
                        Bloglar
                    </div>
                    <div class="page-title-content link-style6">
                        <span><a class="home" href="{{ route('home') }}">Ana Səhifə</a></span> |
                        <span><a class="home" href="{{ route('blogs') }}">Bloglar</a></span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
    <!-- main content -->
    <section class="flat-blog-standard">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="47" data-mobile="0" data-smobile="0"></div>
                </div>
                <div class="col-md-8">
                    <div class="post-wrap">
                        @foreach ($blogs as $blog)
                            <article class="article-1">
                                <div class="image-box">
                                    <div class="image" style="width: 100%;height: 500px;">
                                        <img style="width: 100%;height: 100%; object-fit: cover" src="{{ _img($blog->avatar) }}" alt="{{ $blog->name }}">
                                    </div>

                                </div>
                                <div class="content-box">

                                    <div class="content-art">
                                        <a href="{{ route('blog',$blog->slug) }}" class="section-heading-jost-size28">
                                            {{ $blog->name }}
                                        </a>
                                        <p class="desc-content-box text-decs">
                                            {{  Str::limit(strip_tags(html_entity_decode($blog->content)), 200)  }}
                                        </p>
                                        <div class="link-style2">
                                            <a href="{{ route('blog',$blog->slug) }}" class="read-more">
                                                Ətraflı<i class="fas fa-long-arrow-alt-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </article>
                        @endforeach
                        <div class="themesflat-pagination clearfix">
                            {{-- <ul>
                                <li><a href="#" class="page-numbers prev"><span class="fa fa-angle-left"></span></a></li>
                                <li><a href="#" class="page-numbers current">1</a></li>
                                <li><a href="#" class="page-numbers">2</a></li>
                                <li><a href="#" class="page-numbers">3</a></li>
                                <li><a class="page-numbers">...</a></li>
                                <li><a href="#" class="page-numbers">10</a></li>
                                <li><a href="#" class="page-numbers next"><span class="fa fa-angle-right"></span></a></li>
                            </ul> --}}
                            {{ $blogs->links() }}
                        </div>
                        <!-- end pagination-->
                    </div>
                    <!-- /.post-wrap -->
                </div>
                <!-- /.col-md-8 -->

                <div class="col-md-4">
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="60"></div>
                    <div class="side-bar">
                        {{-- <div class="widgets-search">
                            <h3 class="widgets-side-bar-title">
                                Search
                            </h3>
                            <div class="widgets-input">
                                <form method="get" role="search" class="search-form">
                                    <input type="search" class="search-field" placeholder="Search here" value="" name="s" title="Search for">
                                    <button class="search-submit" type="submit" title="Search"></button>
                                </form>
                            </div>
                        </div> --}}
                        <div class="widget widget_lastest">
                            <h2 class="widgets-side-bar-title"><span>Yeni Bloglar</span></h2>
                            <ul class="lastest-posts data-effect clearfix">
                                @foreach ($recentBlogs as $blg)
                                    <li class="clearfix">
                                        <div class="thumb data-effect-item has-effect-icon">
                                            <img src="{{ _img($blog->avatar) }}" alt="{{ $blg->name }}">
                                        </div>
                                        <div class="text">
                                            <h3><a href="{{ route('blog',$blg->slug) }}" class="title-thumb">{{  Str::limit(strip_tags(html_entity_decode($blg->content)), 50)  }}</a></h3>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                        <!-- /.widget_lastest -->
                        <div class="widgets-contact-info">
                            <div class="contact-info-img">
                                <img src="{{ _frontStaticImg('blog/young-beautiful-florist-watering-flowers.jpg') }}" alt="image">
                            </div>
                            <div class="contact-info-box">
                                <div class="contact-info-content">
                                    <div class="call-us">
                                        <div class="icon-call-us"></div>
                                        <div class="content-call-us">
                                            <h4 class="heading-16px-rubik">Əlaqə</h4>
                                            <h4 class="heading-16px-rubik">{{ _contact('phone') }}</h4>
                                        </div>
                                    </div>
                                    <div class="our-mail">
                                        <div class="icon-our-mail"></div>
                                        <div class="content-our-mail">
                                            <h4 class="heading-16px-rubik">E-Poçt</h4>
                                            <h4 class="heading-16px-rubik">{{ _contact('email') }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-4 -->
                </div>
                <!-- /.row -->
            </div>
        </div> <!-- /.container -->
    </section><!-- /flat-blog -->
@endsection
