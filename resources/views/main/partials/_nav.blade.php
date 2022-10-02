<!-- header -->
<header id="header" class="header header-style2 bg-color">
    <div class="container-fluid">
        <div class="row">
            <div class="header-wrap">
                <div class="col-md-3">
                    <div class="inner-header">
                        <div class="logo-header">
                            <a href="{{ route('home') }}" title="Ana Səhifə">
                                <img src="{{ _frontStaticImg('logo.png') }}" alt="logo" style="width:100px !important" />
                            </a>
                        </div>
                        <!-- /#logo -->
                        <div class="btn-menu">
                            <span></span>
                        </div>
                        <!-- //mobile menu button -->
                    </div>

                </div>
                <!-- /.col-md-3 -->
                <div class="col-md-6">
                    <div class="nav-wrap">
                        <nav id="mainnav" class="mainnav">
                            <ul class="menu">
                                <li>
                                    <a href="{{ route('home') }}" title="Ana Səhifə">Ana səhifə</a>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}" title="Məhsullarımız">Məhsullarımız</a>
                                </li>
                                <li>
                                    <a href="{{ route('services') }}" title="Xidmətlərimiz">Xidmətlərimiz</a>
                                </li>
                                <li>
                                    <a href="{{ route('projects') }}" title="Layihələrimiz">Layihələrimiz</a>
                                </li>
                                <li>
                                    <a href="{{ route('blogs') }}" title="Bloq">Bloq</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="site-header-right">
                        <div class="header-inner">
                            
                            <div class="button">
                                <a href="{{ route('contact') }}" class="btn">Əlaqə</a>
                            </div>
                        </div>
                    </div>
                    <!-- header right -->
                </div>
            </div>
            <!-- /.header-wrap -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</header>
<!-- /header -->