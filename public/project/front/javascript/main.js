/**
    * isMobile
    * responsiveMenu
    * ajaxContactForm
    * wow
    * ajaxSubscribe
    * owl carousel style
    * flatSpacer
    * inViewport
    * googleMap
    * flatCounter
    * headerFixed
    * flatAccordion
    * goTop
    * topSearch
    * removePreloader
    * retinaLogos
*/

; (function ($) {

    'use strict'

    var isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function () {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    var responsiveMenu = function () {
        var menuType = 'desktop';

        $(window).on('load resize', function () {
            var currMenuType = 'desktop';

            if (matchMedia('only screen and (max-width: 991px)').matches) {
                currMenuType = 'mobile';
            }

            if (currMenuType !== menuType) {
                menuType = currMenuType;

                if (currMenuType === 'mobile') {
                    var $mobileMenu = $('#mainnav').attr('id', 'mainnav-mobi').hide();
                    var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');
                    $('#header').append($mobileMenu);
                    hasChildMenu.children('ul').hide();
                    hasChildMenu.children('a').after('<span class="btn-submenu"></span>');
                    $('.btn-menu').removeClass('active');
                } else {
                    var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav').removeAttr('style');

                    $desktopMenu.find('.submenu').removeAttr('style');
                    $('#header').find('.nav-wrap').append($desktopMenu);
                    $('.btn-submenu').remove();
                }
            }
        });

        $('.btn-menu').on('click', function () {
            $('#mainnav-mobi').slideToggle(300);
            $(this).toggleClass('active');
        });

        $(document).on('click', '#mainnav-mobi li .btn-submenu', function (e) {
            $(this).toggleClass('active').next('ul').slideToggle(300);
            e.stopImmediatePropagation()
        });
    }

    var ajaxContactForm = function () {
        $('#contactform').each(function () {
            $(this).validate({
                submitHandler: function (form) {
                    var $form = $(form),
                        str = $form.serialize(),
                        loading = $('<div />', { 'class': 'loading' });

                    $.ajax({
                        type: "POST",
                        url: $form.attr('action'),
                        data: str,
                        beforeSend: function () {
                            $form.find('.form-submit').append(loading);
                        },
                        success: function (msg) {
                            var result, cls;
                            if (msg === 'Success') { result = 'Message Sent Successfully To Email Administrator. ( You can change the email management a very easy way to get the message of customers in the user manual )'; cls = 'msg-success'; } else { result = 'Error sending email.'; cls = 'msg-error'; } $form.prepend(
                                $('<div />', {
                                    'class': 'flat-alert ' + cls,
                                    'text': result
                                }).append(
                                    $('<a class="close" href="#"><i class="fa fa-close"></i></a>')
                                )
                            );

                            $form.find(':input').not('.submit').val('');
                        },
                        complete: function (xhr, status, error_thrown) {
                            $form.find('.loading').remove();
                        }
                    });
                }
            });
        }); // each contactform
    };

    //Wow animation 
    var wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();

    var ajaxSubscribe = {
        obj: {
            subscribeEmail: $('#subscribe-email'),
            subscribeButton: $('#subscribe-button'),
            subscribeMsg: $('#subscribe-msg'),
            subscribeContent: $("#subscribe-content"),
            dataMailchimp: $('#subscribe-form').attr('data-mailchimp'),
            success_message: '<div class="notification_ok">Thank you for joining our mailing list! Please check your email for a confirmation link.</div>',
            failure_message: '<div class="notification_error">Error! <strong>There was a problem processing your submission.</strong></div>',
            noticeError: '<div class="notification_error">{msg}</div>',
            noticeInfo: '<div class="notification_error">{msg}</div>',
            basicAction: 'mail/subscribe.php',
            mailChimpAction: 'mail/subscribe-mailchimp.php'
        },

        eventLoad: function () {
            var objUse = ajaxSubscribe.obj;

            $(objUse.subscribeButton).on('click', function () {
                if (window.ajaxCalling) return;
                var isMailchimp = objUse.dataMailchimp === 'true';

                if (isMailchimp) {
                    ajaxSubscribe.ajaxCall(objUse.mailChimpAction);
                } else {
                    ajaxSubscribe.ajaxCall(objUse.basicAction);
                }
            });
        },

        ajaxCall: function (action) {
            window.ajaxCalling = true;
            var objUse = ajaxSubscribe.obj;
            var messageDiv = objUse.subscribeMsg.html('').hide();
            $.ajax({
                url: action,
                type: 'POST',
                dataType: 'json',
                data: {
                    subscribeEmail: objUse.subscribeEmail.val()
                },
                success: function (responseData, textStatus, jqXHR) {
                    if (responseData.status) {
                        objUse.subscribeContent.fadeOut(500, function () {
                            messageDiv.html(objUse.success_message).fadeIn(500);
                        });
                    } else {
                        switch (responseData.msg) {
                            case "email-required":
                                messageDiv.html(objUse.noticeError.replace('{msg}', 'Error! <strong>Email is required.</strong>'));
                                break;
                            case "email-err":
                                messageDiv.html(objUse.noticeError.replace('{msg}', 'Error! <strong>Email invalid.</strong>'));
                                break;
                            case "duplicate":
                                messageDiv.html(objUse.noticeError.replace('{msg}', 'Error! <strong>Email is duplicate.</strong>'));
                                break;
                            case "filewrite":
                                messageDiv.html(objUse.noticeInfo.replace('{msg}', 'Error! <strong>Mail list file is open.</strong>'));
                                break;
                            case "undefined":
                                messageDiv.html(objUse.noticeInfo.replace('{msg}', 'Error! <strong>undefined error.</strong>'));
                                break;
                            case "api-error":
                                objUse.subscribeContent.fadeOut(500, function () {
                                    messageDiv.html(objUse.failure_message);
                                });
                        }
                        messageDiv.fadeIn(500);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Connection error');
                },
                complete: function (data) {
                    window.ajaxCalling = false;
                }
            });
        }
    };

    //   owl carousel style1
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            650: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })

    //   owl carousel style2

    $('.owl-carousel-2').owlCarousel({
        loop: true,
        autoplay: true,
        margin: 4,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            650: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    })

    var flatSpacer = function () {
        $(window).on('load resize', function () {
            var mode = 'desktop';
            if (matchMedia('only screen and (max-width: 991px)').matches)
                mode = 'mobile';
            if (matchMedia('only screen and (max-width: 767px)').matches)
                mode = 'smobile';
            $('.themesflat-spacer').each(function () {
                if (mode === 'desktop') {
                    $(this).attr('style', 'height:' + $(this).data('desktop') + 'px')
                } else if (mode == 'mobile') {
                    $(this).attr('style', 'height:' + $(this).data('mobile') + 'px')
                } else {
                    $(this).attr('style', 'height:' + $(this).data('smobile') + 'px')
                }
            });
        });
    };

    var inViewport = function () {
        $('[data-inviewport="yes"]').waypoint(function () {
            $(this).trigger('on-appear');
        }, { offset: '90%', triggerOnce: true });

        $(window).on('load', function () {
            setTimeout(function () {
                $.waypoints('refresh');
            }, 100);
        });
    };

    var googleMap = function () {
        // gmap default
        if ($().gmap3) {
            var data = JSON.parse('[{"address":"Westwell Leacon, Ashford, Vương Quốc Anh","content":""}]');
            $(".themesflat-map")
                .gmap3({
                    map: {
                        options: {
                            zoom: 10,
                            center: [51.1946026, 0.8140602, 14.5],
                            mapTypeId: 'Autora',
                            mapTypeControlOptions: {
                                mapTypeIds: ['Autora', google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID]
                            },
                            scrollwheel: true
                        },
                    },
                });

        }
        // json loop
        $.each(data, function (key, val) {
            $('.themesflat-map').gmap3({
                marker: {
                    values: [{
                        address: val.address,
                        options: {
                            icon: "./assets/img/map/icon-map.png"
                        }

                    }]
                },
                styledmaptype: {
                    id: "Autora",
                    options: {
                        name: "Autora"
                    },
                    styles: [
                        {
                            "featureType": "administrative",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "saturation": "-100"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative.province",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": 65
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": "50"
                                },
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "saturation": "-100"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "lightness": "30"
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "lightness": "40"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "saturation": -100
                                },
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "hue": "#ffff00"
                                },
                                {
                                    "lightness": -25
                                },
                                {
                                    "saturation": -97
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "lightness": -25
                                },
                                {
                                    "saturation": -100
                                }
                            ]
                        }
                    ]
                }
            });
        });
    };

    var flatCounter = function () {
        if ($().countTo) {
            $('.themesflat-counter').on('on-appear', function () {
                $(this).find('.number').each(function () {
                    var to = $(this).data('to'),
                        speed = $(this).data('speed');

                    $(this).countTo({
                        to: to,
                        speed: speed
                    });
                });
            });
        }
    };

    var headerFixed = function() {
        var nav = $('.header-style2.bg-color');
            if ( nav.size() !== 0 ) {

            $(window).on('load', function(){
            var header = $('.header-style2.bg-color');           
            var offsetTop = $('.header-style2.bg-color').offset().top;
            var headerHeight = $('.header-style2.bg-color').height();
            var buffer  = $('<div>', { height: headerHeight }).insertAfter(header);   
                buffer.hide();                 

                $(window).on('load scroll', function(){
                    if ( $(window).scrollTop() > offsetTop  ) {
                        $('.header-style2.bg-color').addClass('fixed-header');
                        buffer.show();
                    } else {
                        $('.header-style2.bg-color').removeClass('fixed-header');
                        buffer.hide();
                    }
                })
           
            });
        }
    };

    var flatAccordion = function () {
        var args = { duration: 600 };
        $('.flat-toggle .toggle-title.active').siblings('.toggle-content').show();

        $('.flat-toggle.enable .toggle-title').on('click', function () {
            $(this).closest('.flat-toggle').find('.toggle-content').slideToggle(args);
            $(this).toggleClass('active');
        }); // toggle 

        $('.flat-accordion .toggle-title').on('click', function () {
            if (!$(this).is('.active')) {
                $(this).closest('.flat-accordion').find('.toggle-title.active').toggleClass('active').next().slideToggle(args);
                $(this).toggleClass('active');
                $(this).next().slideToggle(args);
            } else {
                $(this).toggleClass('active');
                $(this).next().slideToggle(args);
            }
        }); // accordion
    };

    var goTop = function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 800) {
                $('.go-top').addClass('show');
            } else {
                $('.go-top').removeClass('show');
            }
        });

        $('.go-top').on('click', function () {
            $("html, body").animate({ scrollTop: 0 }, 1000, 'easeInOutExpo');
            return false;
        });
    };

    var topSearch = function () {
        $(document).on('click', function (e) {
            var clickID = e.target.id;
            if ((clickID !== 's')) {
                $('.top-search').removeClass('show');
            }
        });

        $('.show-search').on('click', function (event) {
            event.stopPropagation();
        });

        $('.search-form').on('click', function (event) {
            event.stopPropagation();
        });

        $('.show-search').on('click', function (event) {
            if (!$('.top-search').hasClass("show")) {
                $('.top-search').addClass('show');
                event.preventDefault();
            }

            else
                $('.top-search').removeClass('show');
            event.preventDefault();

            if (!$('.show-search').hasClass("active"))
                $('.show-search').addClass('active');
            else
                $('.show-search').removeClass('active');
        });
    }

    var removePreloader = function () {
        $(window).load(function () {

            $('.preloader').css('opacity', 0);
            setTimeout(function () {
                $('.preloader').hide();
            }, 1000
            );
        });
    };

    var retinaLogos = function() {
        var retina = window.devicePixelRatio > 1 ? true : false;
          if(retina) {
            //   $('.logo-header').find('img').attr( {src:'./project/front/icon/logo-dark@2x.png',width:'172.7',height:'59.96'} );
            //   $('.logo-footer-style2').find('img').attr( {src:'./project/front//icon/logo-dark@2x.png',width:'172.7',height:'59.96'} );
            //   $('.logo-footer').find('img').attr( {src:'./project/front//icon/logo-light@2x.png',width:'172.7',height:'59.96'} );  
          }
      };       

    // Dom Ready
    $(function () {
        responsiveMenu();
        ajaxSubscribe.eventLoad();
        ajaxContactForm();
        flatCounter();
        inViewport();
        googleMap();
        flatAccordion();
        headerFixed();
        goTop();
        topSearch();
        removePreloader();
        flatSpacer();
        retinaLogos();
        $(window).load(function () {
            inViewport();
        });
    });

})(jQuery);
