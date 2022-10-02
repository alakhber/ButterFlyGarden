<!-- footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="top-footer wow fadeInDown">
                    <div class="top-footer-left">
                        <div class="logo-footer1 text-center">
                            <a href="{{ route('home') }}"><img src="{{ _frontStaticImg('logo.png') }}" style="height: 120px !important" alt="images"></a>
                        </div>
                    </div>
                    <div class="top-footer-right">
                        <div class="footer-contact-info">
                            <div class="footer-info-item">
                                <div class="location">
                                    <div class="icon-location"></div>
                                    <div class="content-location">
                                        <div class="heading-16px-rubik">{{ _contact('address') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-info-item">
                                <div class="phone-call">
                                    <div class="icon-phone-call"></div>
                                    <div class="content-phone-call">
                                        <div class="heading-16px-rubik" style="margin-top: 10px">{{ _contact('phone') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-info-items">
                                <div class="email">
                                    <div class="icon-email"></div>
                                    <div class="content-email">
                                        <div class="heading-16px-rubik" style="margin-top: 10px">{{ _contact('email') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="list-footer wow fadeInUp">
                    <div class="footer-item">
                        <div class="widgets-about padding-top-listfooter">
                            <p class="heading-jost-20px">
                                Sosial Media
                            </p>
                            {{-- <p class="text-decs">
                                Lorem Ipsum simply dummy text available in market the printing text, MORE...
                            </p> --}}
                            <ul class="widgets-nav-social">
                                <li><a href="{{ _contact('facebook') }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="{{ _contact('twitter') }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="{{ _contact('instagram') }}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="{{ _contact('linkedin') }}"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-item">
                        <div class="widgets-menu-1 padding-top-listfooter">
                            <p class="heading-jost-20px">
                                Səhifələr
                            </p>
                            <ul class="list-menu-1 text-decs link-style4">
                                @foreach ($pages as $page)
                                    <li><a href="#{{ $page->slug }}">{{ $page->name }}</a> </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="footer-item padding-top-listfooter">
                        <div class="widgets-menu-2">
                            <p class="heading-jost-20px">
                                Son Bloglar
                            </p>
                            <ul class="list-menu-2 text-decs link-style4">
                                @foreach ($resendBlogs as $blog)
                                    <li>
                                        <h3 class="heading-menu2"><a href="{{ route('blog', $blog->slug) }}">{{ $blog->name }}</a></h3>
                                        {{-- <span class="post-date"><span class="entry-date">December 7,
                                                2021</span></span> --}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="footer-item padding-top-listfooter">
                        <div class="widgets-subcribes">
                            <p class="heading-jost-20px">
                                Bizi İzləyin
                            </p>
                            {{-- <p class="text-decs">
                                Lorem Ipsum is simply dummy text of in market the printing typesetting.
                            </p> --}}
                            <div class="widgets-input-subcribes">
                                <form method="post" action="{{ route('subscription') }}" class="form-subcribe">
                                    @csrf
                                    <input type="email" name="email" class="widgets-text-input" placeholder="Email Address" required>
                                    <button type="submit" class="fa fa-envelope"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright link-style4">
                        <div class="col-lg-12">
                            <img style="display: block;
                            margin-left: auto;
                            margin-right: auto;
                            width: 100px;
                            margin-top:20px;
                            margin-bottom:20px;
                            " src="{{ _frontStaticImg('logo.png') }}" alt="">
                        </div>
                        <p class="copyright-text">

                            &copy; 2022 by ButterFlyGarden
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- / footer -->

<!-- btn go top -->
<div class="button-go-top">
    <a href="#" title="" class="go-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>
<!-- / btn go top -->
