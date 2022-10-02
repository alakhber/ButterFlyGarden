<div class="sidebar sidebar-light sidebar-main sidebar-expand-lg">
    <div class="sidebar-content">
        <div class="sidebar-section">
            <div class="sidebar-user-material">
                <div class="sidebar-section-body">
                    <div class="d-flex">
                        <div class="flex-1">
                            <button type="button" class="btn btn-outline-light border-transparent btn-icon btn-sm rounded-pill">
                                {{-- <i class="icon-wrench"></i> --}}
                            </button>
                        </div>
                        <a href="#" class="flex-1 text-center"><img src="{{ _adminStaticImg('placeholders/placeholder.jpg') }}" class="img-fluid rounded-circle shadow-sm" width="80" height="80" alt=""></a>
                        <div class="flex-1 text-right">
                            <button type="button" class="btn btn-outline-light border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                                <i class="icon-transmission"></i>
                            </button>

                            <button type="button" class="btn btn-outline-light border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                                <i class="icon-cross2"></i>
                            </button>
                        </div>
                    </div>
                    <div class="text-center">
                        <h6 class="mb-0 text-white text-shadow-dark mt-3">{{ auth()->user()->fullname }}</h6>
                        <span class="font-size-sm text-white text-shadow-dark">{{ auth()->user()->type }}</span>
                    </div>
                </div>
                <div class="sidebar-user-material-footer">
                    <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>User menu</span></a>
                </div>
            </div>
            <div class="collapse border-bottom" id="user-nav">
                <ul class="nav nav-sidebar">
                    <li class="nav-item">
                        <a href="{{ route('system.user.profil') }}" class="nav-link">
                            <i class="icon-gear"></i>
                            <span>Hesab</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link LOGOUT">
                            <i class="icon-switch2"></i>
                            <span>Çıxış</span>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="{{ route('system.home') }}" class="nav-link">
                        <i class="icon-home4"></i>
                        <span>
                            Ana Səhifə
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.product.index') }}" class="nav-link">
                        <i class="fas fa-box-open"></i>
                        <span>
                            Məhsullar
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.category.index') }}" class="nav-link">
                        <i class="icon-tree6"></i>
                        <span>
                            Kataloq
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.user.index') }}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>
                            İstifadəçilər
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.blog.index') }}" class="nav-link">
                        <i class="fab fa-blogger-b"></i>
                        <span>
                            Blog
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.setting.index') }}" class="nav-link">
                        <i class="fas fa-cogs"></i>
                        <span>
                            Tənzimləmələr
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.project.index') }}" class="nav-link">
                        <i class="fas fa-lightbulb"></i>
                        <span>
                            Lahiyələr
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.service.index') }}" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>
                            Xidmətlər
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.contact.index') }}" class="nav-link">
                        <i class="fas fa-address-card"></i>
                        <span>
                            Əlaqə
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.page.index') }}" class="nav-link">
                        <i class="fas fa-file"></i>
                        <span>
                            Səhifələr
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.partner.index') }}" class="nav-link">
                        <i class="fas fa-handshake"></i>
                        <span>
                            Partner
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.subscriptions.index') }}" class="nav-link">
                        <i class="fas fa-heart"></i>
                        <span>
                            İzləyicilər
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.image.index') }}" class="nav-link">
                        <i class="fas fa-images"></i>
                        <span>
                            Şəkillər
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.image.index') }}" class="nav-link">
                        <i class="fas fa-user"></i>
                        <span>
                            Komanda
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('system.slider.index') }}" class="nav-link">
                        <i class="fas fa-images"></i>
                        <span>
                            Slider
                        </span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fab fa-searchengin"></i>
                        <span>
                            Seo
                        </span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('system.about.index') }}" class="nav-link">
                        <i class="fas fa-portrait"></i>
                        <span>
                            Haqqımızda
                        </span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cart-arrow-down"></i>
                        <span>
                            Sifarişlər
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-envelope-open-text"></i>
                        <span>
                            Mesajlar
                        </span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Layout</div> <i class="icon-menu" title="Layout options"></i></li>
                <li class="nav-item nav-item-submenu nav-item-expanded nav-item-open">
                    <a href="#" class="nav-link"><i class="icon-stack2"></i> <span>Page layouts</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Page layouts">
                        <li class="nav-item"><a href="layout_static.html" class="nav-link active">Static layout</a></li>
                        <li class="nav-item"><a href="layout_no_header.html" class="nav-link">No header</a></li>
                        <li class="nav-item"><a href="layout_no_footer.html" class="nav-link">No footer</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="layout_fixed_header.html" class="nav-link">Fixed header</a></li>
                        <li class="nav-item"><a href="layout_fixed_footer.html" class="nav-link">Fixed footer</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="layout_2_sidebars_1_side.html" class="nav-link">2 sidebars on 1 side</a></li>
                        <li class="nav-item"><a href="layout_2_sidebars_2_sides.html" class="nav-link">2 sidebars on 2 sides</a></li>
                        <li class="nav-item"><a href="layout_3_sidebars.html" class="nav-link">3 sidebars</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="layout_boxed_page.html" class="nav-link">Boxed page</a></li>
                        <li class="nav-item"><a href="layout_boxed_content.html" class="nav-link">Boxed content</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-tree5"></i> <span>Menu levels</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Menu levels">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-IE"></i> Second level</a></li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-firefox"></i> Second level with child</a>
                            <ul class="nav nav-group-sub">
                                <li class="nav-item"><a href="#" class="nav-link"><i class="icon-android"></i> Third level</a></li>
                                <li class="nav-item nav-item-submenu">
                                    <a href="#" class="nav-link"><i class="icon-apple2"></i> Third level with child</a>
                                    <ul class="nav nav-group-sub">
                                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-html5"></i> Fourth level</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-css3"></i> Fourth level</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="icon-windows"></i> Third level</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chrome"></i> Second level</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</div>