@extends('layouts.main')

@section('_title')
    | Məhsullar
@endsection

@section('_content')
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="https://butterflygarden.az/project/front/shop/css/custom.css">

    <!-- page title -->

    <div class="page-title">

        <div class="container-fluid">

            <div class="row">

                <div class="inner-title">

                    <div class="overlay-image"></div>

                    <div class="banner-title">

                        <div class="page-title-heading">

                            Məhsullar

                        </div>

                        <div class="page-title-content link-style6">

                            <span><a class="home" href="{{ route('home') }}">Ana Səhifə</a></span><span class="page-title-content-inner">Məhsullar</span>

                        </div>

                    </div>

                </div>



            </div>



        </div>

    </div>

    <!-- /.page-title -->

    <section class="flat-why-choose-us">
        <!-- PRODUCT DETAILS AREA START -->
        <div class="ltn__product-area ltn__product-gutter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-120">
                        <aside class="sidebar ltn__shop-sidebar">
                            <!-- Category Widget -->
                            <div class="widget ltn__menu-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">Kataloq</h4>
                                <ul>
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('products', $category->slug) }}">{{ $category->name }}</a>
                                            @if ($category->child_count > 0)
                                                <ul style="margin-left: 10px">
                                                    @foreach ($category->child as $child)
                                                        <li><a href="{{ route('products', $child->slug) }}">{{ $child->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget ltn__search-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border">Axtar</h4>
                                <form action="{{ route('products') }}" method="get">
                                    <input type="text" name="q" placeholder="Məhsul Axtar">
                                    <button class="float-end">Axtar</button>
                                </form>
                            </div>
                        </aside>
                    </div>

                    <div class="col-lg-8 order-lg-2 mb-120">

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="liton_product_grid">
                                <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-xl-6 col-sm-6 col-6 ">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img" style="height:300px !important">
                                                        <a href="{{ route('product', $product->slug) }}"><img style="width: 100%;height: 100% !important;object-fit:cover" src="{{ _img($product->avatar) }}" alt="{{ $product->name }}"></a>
                                                        <div class="product-badge">
                                                            <ul>
                                                                @if (\Carbon\Carbon::parse($product->created_at)->isToday())
                                                                    <li class="sale-badge">Yeni</li>
                                                                @endif
                                                                @if ($product->instock == 0)
                                                                    <li class="sale-badge" style="background-color: #f0ad4e">Stokda Bitib</li>
                                                                @else
                                                                    <li class="sale-badge" style="background-color: #0275d8">Stokda Var</li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        {{-- <div class="product-hover-action">
                                                            <ul>
                                                                <li>
                                                                    <a href="{{ route('product', $product->slug) }}" title="Ətraflı Bax">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div> --}}
                                                    </div>
                                                    <div class="product-info">

                                                        <h2 class="product-title"><a href="{{ route('products', $product->category->slug) }}">{{ $product->category->name }}</a></h2>
                                                        <div class="product-price">
                                                           <a href="{{ route('product', $product->slug) }}"> <span>{{ $product->name }}</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row ">
                            <div class="col-lg-12  ">
                                <div class="themesflat-pagination clearfix row">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- PRODUCT DETAILS AREA END -->
    </section>

    <!-- All JS Plugins -->
    <script src="https://butterflygarden.az/project/front/shop/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="https://butterflygarden.az/project/front/shop/js/main.js"></script>
@endsection
