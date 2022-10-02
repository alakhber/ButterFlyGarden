@extends('layouts.main')
@section('_title')
| Əlaqə
@endsection
@section('_content')
    <div class="page-title">
        <div class="container-fluid">
            <div class="row">
                <div class="inner-title">
                    <div class="overlay-image"></div>
                    <div class="banner-title">
                        <div class="page-title-heading">
                            Contact
                        </div>
                        <div class="page-title-content link-style6">
                            <span><a class="home" href="{{ route('home') }}">Ana Səhifə</a></span><span class="page-title-content-inner">Əlaqə</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- /.page-title -->


    <!-- Contact -->
    <section class="flat-contact-page">
        <div class="container">
            <div class="row">
                <div class="col-md-5 wow fadeInUp">
                    <div class="contact-left">
                        {{-- <h3 class="section-subtitle mg-bottom-22">Əlaqə Üçün</h3> --}}
                        <h2 class="section-title mg-bottom-15">Bizimlə Rahat Əlaqə Saxlamağınız Üçün</h2>
                        <p class="section-desc mg-bottom-60"> </p>
                        <div class="address-box mg-bottom30">
                            <div class="contact-location icon-map"></div>
                            <div class="info text-pri2-color">
                                <h3 class="section-heading-jost-size20">
                                    Ünvan</h3>
                                <p class="desc-box text-pri2-color">{{ _contact('address') }}</p>
                            </div>
                        </div>
                        <div class="address-box mg-bottom30">
                            <div class="contact-phone icon-phone"></div>
                            <div class="info text-pri2-color">
                                <h3 class="section-heading-jost-size20">
                                    Mobil</h3>
                                <p class="desc-box text-pri2-color">{{ _contact('phone') }}</p>
                            </div>
                        </div>
                        <div class="address-box">
                            <div class="contact-mail icon-mail"></div>
                            <div class="info text-pri2-color">
                                <h3 class="section-heading-jost-size20">
                                    E-Poçt</h3>
                                <p class="desc-box text-pri2-color">{{ _contact('email') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="30" data-smobile="30"></div>
                </div>
                <div class="col-md-7 wow fadeInUp">
                    <div class="contact-right">
                        <form method="post" action="{{ route('contact-mail') }}" class="form-contact-right">
                            @csrf
                            <div class="input-row">
                                <div class="input-name">
                                    <label for="fullname" class="heading-features">Ad Soyad* </label>
                                    <input id="fullname" name="fullname" class="input-contact" type="text" placeholder="Ad Soyad" required>
                                </div>
                                <div class="input-phone">
                                    <label for="phone" class="heading-features">Əlaqə Nömrəsi*</label>
                                    <input id="phone" name="phone" class="input-contact" type="text" placeholder="Əlaqə Nömrəsi" required>
                                </div>
                            </div>
                            <div class="input-row">
                                <div class="input-email">
                                    <label id="email" class="heading-features">E-Poçt* </label>
                                    <input type="email" name="email" class="input-contact" placeholder="E-Poçt" required>
                                </div>
                            </div>
                            <div class="input-message">
                                <label for="message" class="heading-features">Mesajınız*</label>
                                <textarea name="message" class="input-contact-message" id="message" placeholder="Mesajınız"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-left">Göndər</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Contact -->
@endsection
