@extends('layouts.main')
@section('_title')
| {{ $blog->name }}
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
                            {{ $blog->name }}
                        </div>
                        <div class="page-title-content link-style6">
                            <span><a class="home" href="{{ route('home') }}">Ana Səhifə</a></span> |
                            <span><a class="home" href="{{ route('blogs') }}">Bloglar</a></span>
                            <span class="page-title-content-inner">{{ $blog->name }}</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /.page-title -->

    <!-- main content -->
    <section class="flat-blog-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="166" data-mobile="0" data-smobile="0"></div>
                </div>
                <div class="col-md-8">
                    <div class="post-wrap">
                        <div class="content-blog-detail">
                            <div class="image-box">
                                <div class="image" style="width: 100%;height: 500px;">
                                    <img style="width: 100%;height: 100%; object-fit: cover" src="{{ _img($blog->avatar) }}" alt="{{ $blog->avatar }}">
                                </div>
                            </div>
                            <div class="content mg-top-15">
                                
                                <div class="heading-content-box">
                                    <a href="{{ url()->current() }}">
                                        {{ $blog->name }}
                                    </a>
                                </div>


                                <div class="desc-content-box text-decs">
                                    {!! $blog->content !!} 
                                </div>
                                {{-- <div class="content-note-author">
                                    <p class="desc-content-box text-decs">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                    </p>
                                    <a href="#" class="author heading-16px-rubik">
                                        Marilyn Gilbert
                                    </a>

                                </div> --}}
                                {{-- <p class="desc-content-box text-decs">
                                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                    sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                                </p>
                                <div class="image-box">
                                    <div class="image-2">
                                        <img src="images/blog/young-woman-working-glass-greenhouse.jpg" alt="image">
                                    </div>
                                </div>
                                <div class="content-2 heading-content-box">
                                    <a href="blog-detail.html">
                                        AMC Entertainment sparks calls for scrutiny
                                    </a>
                                </div> --}}


                                {{-- <p class="desc-content-box text-decs">
                                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                    sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                                </p>
                                <ul class="nav-access-blog-detail">
                                    <li><a href="#" class="tick">sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam</a></li>
                                    <li><a href="#" class="tick">Stet clita kasd gubergren, no sea takimata sanctus</a></li>
                                    <li><a href="#" class="tick">Lorem ipsum dolor sit amet, consetetur sadipscing elitr</a></li>
                                </ul> --}}
                                <hr>
                                {{-- <div class="bottom-content">
                                <div class="related-tag">
                                    <h3 class="title heading-16px-rubik">Related Tags :</h3>
                                    <ul class="list-related">
                                        <li><a href="#">Business.</a></li>
                                        <li><a href="#">Corporate.</a></li>
                                        <li><a href="#">Agency</a></li>
                                    </ul>
                                </div>
                                <div class="social-share">
                                    <h3 class="title2 heading-16px-rubik">Share :</h3>
                                    <ul class="widgets-nav-social">
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="widgets-comment">
                                <div class="widgets-title-comment">
                                    Comments
                                </div>
                                <div class="widgets-comment-box">
                                    <div class="box-1">
                                        <div class="image-comment bd-radius-50-image">
                                            <img src="images/blog/avt1.jpg" alt="image">
                                        </div>
                                        <div class="content-comment">
                                            <div class="title">
                                                <div class="heading"> <a href="#">Laurel Wallace</a> </div>
                                                <div class="date-comments"><a href="#">May 18</a> </div>
                                            </div>
                                            <p class="desc-content-box text-decs">
                                                Proin ac quam et lectus vestibulum blandit. Nunc maximus nibh at placerat tincidunt. Nam sem lacus, ornare non ante sed, ultricies.
                                            </p>
                                            <div class="reply">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="box-2">
                                        <div class="image-comment bd-radius-50-image">
                                            <img src="images//blog/avt2.jpg" alt="image">
                                        </div>
                                        <div class="content-comment">
                                            <div class="title">
                                                <div class="heading"> <a href="#">Bobby Hawkins</a> </div>
                                                <div class="date-comments"><a href="#">December 22</a> </div>
                                            </div>
                                            <p class="desc-content-box text-decs">
                                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut arcu libero, pulvinar non.
                                            </p>
                                            <div class="reply">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- comments -->
                            <!-- input comment -->
                            <div class="widgets-post-comment">
                                <div class="widgets-title-comment">
                                    Leave a Reply
                                </div>
                                <div class="widgets-input-box">
                                    <span><input class="tf-input input-yourname" type="text" placeholder="Your Name"></span>
                                    <span><input class="tf-input input-youremail" type="email"  placeholder="Your E-mail"></span>
                                    <span><textarea class="tf-input input-yourmessage" placeholder="Enter comment here" name="message" cols="30" rows="10"></textarea></span>
                                    <div class="tf-submit-input">
                                        <a href="#" class="tf-button">Post Comment</a>
                                    </div>
                                </div>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /.post-wrap -->

                </div>
                <!-- /.col-md-8 -->

                <div class="col-md-4">
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="60"></div>
                    <div class="side-bar">
                        @if (count($latestBlogs)>0)
                        <div class="widget widget_lastest">
                            <h2 class="widgets-side-bar-title"><span>Son Bloglar</span></h2>
                            <ul class="lastest-posts data-effect clearfix">
                                @foreach ($latestBlogs as $blg)
                                    <li class="clearfix">
                                        <div class="thumb data-effect-item has-effect-icon">
                                            <img src="images/blog/medium-shot-woman-holding-plant-pot.jpg" alt="{{ $blg->name }}">
                                            <div class="elm-link">
                                                <a href="{{ route('blog',$blg->slug) }}" class="icon-2"></a>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <h3><a href="{{ route('blog',$blg->slug) }}" class="title-thumb">{{ $blg->name }}</a></h3>
                                            
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <!-- /.widget_lastest -->
                        <div class="widgets-contact-info">
                            <div class="contact-info-img">
                                <img src="{{ _frontStaticImg('blog/young-beautiful-florist-watering-flowers.jpg') }}" alt="Contact">
                            </div>
                            <div class="contact-info-box">
                                <div class="contact-info-content">
                                    <div class="call-us">
                                        <div class="icon-call-us"></div>
                                        <div class="content-call-us">
                                            <div class="heading-16px-rubik">Tel</div>
                                            <div class="heading-16px-rubik">{{ _contact('phone') }}</div>
                                        </div>
                                    </div>
                                    <div class="our-mail">
                                        <div class="icon-our-mail"></div>
                                        <div class="content-our-mail">
                                            <div class="heading-16px-rubik">E-Poçt</div>
                                            <div class="heading-16px-rubik">{{ _contact('email') }}</div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-md-12">
                    <div class="themesflat-spacer clearfix" data-desktop="193" data-mobile="60" data-smobile="60"></div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.main-content -->
@endsection
