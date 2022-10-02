<!-- Main navbar -->
<div class="navbar navbar-expand-lg navbar-dark bg-indigo navbar-static">
    <div class="d-flex flex-1 d-lg-none">
        <button data-target="#navbar-search" type="button" class="navbar-toggler" data-toggle="collapse">
            <i class="icon-search4"></i>
        </button>
        <button type="button" class="navbar-toggler sidebar-mobile-main-toggle">
            <i class="icon-transmission"></i>
        </button>
    </div>

    <div class="navbar-brand text-center text-lg-left">
        <a href="index.html" class="d-inline-block">
            <img src="{{ _adminStaticImg('logo_light.png')}}" class="d-none d-sm-block" alt="Logo">
            <img src="{{ _adminStaticImg('logo_icon_light.png')}}" class="d-sm-none" alt="Logo">
        </a>
    </div>

    {{-- <div class="navbar-collapse collapse flex-lg-1 mx-lg-3 order-2 order-lg-1" id="navbar-search">
        <div class="navbar-search d-flex align-items-center py-2 py-lg-0">
            <div class="form-group-feedback form-group-feedback-left flex-grow-1">
                <input type="text" class="form-control" placeholder="Search">
                <div class="form-control-feedback">
                    <i class="icon-search4 text-white opacity-50"></i>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="d-flex justify-content-end align-items-center flex-1 flex-lg-0 order-1 order-lg-2">
        <ul class="navbar-nav flex-row">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link navbar-nav-link-toggler">
                    <i class="icon-make-group"></i>
                    <span class="d-none d-lg-inline-block ml-2">Text link</span>
                </a>
            </li>

            <li class="nav-item nav-item-dropdown-lg dropdown">
                <a href="#" class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-pulse2"></i>
                    <span class="d-none d-lg-inline-block ml-2">Dropdown</span>
                </a>
                
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item">Menu item 1</a>
                    <a href="#" class="dropdown-item">Menu item 2</a>
                    <a href="#" class="dropdown-item">
                        Menu item 3
                        <span class="badge badge-primary badge-pill ml-auto">2</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">Menu item 4</a>
                </div>
            </li>

            <li class="nav-item">
                <a href="#" class="navbar-nav-link navbar-nav-link-toggler">
                    <i class="icon-stack2"></i>
                </a>
            </li>
        </ul>
    </div> --}}
</div>
<!-- /main navbar -->