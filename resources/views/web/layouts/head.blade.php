<head>


    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>FREELANCE ARABIA | HOME</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('web_ar/css/bootstrap.rtl.min.css')}}"/>

    @else
        <link href="{{asset('web_en/css/bootstrap.min.css')}}" rel="stylesheet">

    @endif
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('web_en/img/apple-touch-icon.png')}} "/>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('web_en/img/favicon-32x32.png')}}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('web_en/img/favicon-16x16.png')}}"/>
    <link rel="manifest" href=" {{asset('web_en/img/site.webmanifest')}}"/>
    <link rel="mask-icon" href="{{asset('web_en/img/safari-pinned-tab.svg')}}" color="#5bbad5"/>
    <link rel="shortcut icon" href="{{asset('web_en/img/safari-pinned-tab.svg')}}"/>
    <link rel="stylesheet" href="{{asset('web_en/vendor/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('web_en/js/tagify/tagify.css')}}">
    <meta name="msapplication-TileColor" content="#da532c"/>
    <meta name="msapplication-config" content="{{asset('web_en/img/browserconfig.xml')}}"/>
    <meta name="theme-color" content="#ffffff"/>



    <link rel="stylesheet" href="{{asset('web_en/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('web_en/css/newStyle.css')}}"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>


    <style>
        div.stars {
            width: 270px;
            display: inline-block;
        }

        input.star {
            display: none;
        }

        label.star {
            float: right;
            padding: 10px;
            font-size: 36px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked ~ label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s;
        }

        input.star-5:checked ~ label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }

        input.star-1:checked ~ label.star:before {
            color: #F62;
        }

        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }

        label.star:before {
            content: '\f006';
            font-family: FontAwesome;
        }
    </style>


    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('web_ar/css/rtl.css')}}"/>



    @endif


    @yield('style')
    @stack('style_css')


    <script defer src="https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/7.24.0/firebase-messaging.js"></script>
    <script defer src="{{ asset('web_ar/js/fcm/firebase_ini.js') }}" type="text/javascript"></script>
    <script defer src="{{ asset('web_ar/js/fcm/fcm.js?v=2')}}" type="text/javascript"></script>

</head>


{{--
@if($dir =='ltr')
@else--}}
{{--    <head>
        <meta charset="utf-8" />
        <script defer src="https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js"></script>
        <script defer src="https://www.gstatic.com/firebasejs/7.24.0/firebase-messaging.js"></script>
        <script defer src="{{ asset('web_ar/js/fcm/firebase_ini.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('web_ar/js/fcm/fcm.js?v=2')}}" type="text/javascript"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="{{asset('web_ar/css/bootstrap.rtl.min.css')}}"/>
        --}}{{--        <link href="{{asset('web_ar/css/bootstrap.min.css')}}" rel="stylesheet">--}}{{--
        <link rel="stylesheet" href="{{asset('web_ar/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('web_ar/css/newStyle.css')}}" />
        <link
            rel="stylesheet"
            href="https://unpkg.com/swiper/swiper-bundle.min.css"
        />
        <script src="{{asset('web_ar/js/d0dbf24603.js')}}"></script>
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('web_ar/img/apple-touch-icon.png')}} "/>
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('web_ar/img/favicon-32x32.png')}}"/>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('web_ar/img/favicon-16x16.png')}}"/>
        <link rel="manifest" href=" {{asset('web_ar/img/site.webmanifest')}}" />
        <link rel="mask-icon" href="{{asset('web_ar/img/safari-pinned-tab.svg')}}" color="#5bbad5" />
        <link rel="shortcut icon" href="{{asset('web_ar/img/safari-pinned-tab.svg')}}" />
        <link rel="stylesheet" href="{{asset('web_ar/vendor/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('web_en/js/tagify/tagify.css')}}">
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta name="msapplication-config" content="img/browserconfig.xml" />

        <meta name="theme-color" content="#ffffff" />
        <title>الرئيسية</title>
        <style>
            div.stars {
                width: 270px;
                display: inline-block;
            }

            input.star { display: none; }

            label.star {
                float: right;
                padding: 10px;
                font-size: 36px;
                color: #444;
                transition: all .2s;
            }

            input.star:checked ~ label.star:before {
                content: '\f005';
                color: #FD4;
                transition: all .25s;
            }

            input.star-5:checked ~ label.star:before {
                color: #FE7;
                text-shadow: 0 0 20px #952;
            }

            input.star-1:checked ~ label.star:before { color: #F62; }

            label.star:hover { transform: rotate(-15deg) scale(1.3); }

            label.star:before {
                content: '\f006';
                font-family: FontAwesome;
            }
        </style>--}}

{{--
@endif
--}}

{{--
        <style>
            .navbar .nav-menu-start .nav-item .nav-link {
                color: #194276;
            }
        </style>
--}}
