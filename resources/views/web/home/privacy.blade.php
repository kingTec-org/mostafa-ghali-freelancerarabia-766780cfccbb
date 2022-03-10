@php
    $dir = getLang() === 'ar' ? 'rtl' : 'ltr';
    $auth_user = auth('web')->user();
    $categories = \App\Models\Category\Category::get();
    $labels = labels(['web.general']);

  if(!is_null($auth_user)){
        $messages = \App\Models\Messages\Messages::where('receiver_id',$auth_user->id)->with('Sender')->get()->take(5);
        $notifications =$auth_user->unreadNotifications;
 $user_cart = \App\Models\Cart\Cart::where('user_id',$auth_user->id)->where('cart_id', getCartId())->get(); $cart_items  = \App\Models\Cart\Cart::where('user_id',$auth_user->id)->where('cart_id', getCartId())->with('service')->take(5)->get();  }

@endphp

    <!DOCTYPE html>
<html dir="rtl">
<head>
    @yield('style')
    @if($dir =='ltr')
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <script defer src="https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js"></script>
        <script defer src="https://www.gstatic.com/firebasejs/7.24.0/firebase-messaging.js"></script>
        <script defer src="{{ asset('web_ar/js/fcm/firebase_ini.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('web_ar/js/fcm/fcm.js?v=2')}}" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
              integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
              integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link href="{{asset('web_en/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('web_en/css/style.css')}}"/>
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('web_en/img/apple-touch-icon.png')}} "/>
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('web_en/img/favicon-32x32.png')}}"/>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('web_en/img/favicon-16x16.png')}}"/>
        <link rel="manifest" href=" {{asset('web_en/img/site.webmanifest')}}"/>
        <link rel="mask-icon" href="{{asset('web_en/img/safari-pinned-tab.svg')}}" color="#5bbad5"/>
        <link rel="shortcut icon" href="{{asset('web_en/img/safari-pinned-tab.svg')}}"/>
        <link rel="stylesheet" href="{{asset('web_en/vendor/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('web_en/js/tagify/tagify.css')}}">
        @yield('style')
        <meta name="msapplication-TileColor" content="#da532c"/>
        <meta name="msapplication-config" content="{{asset('web_en/img/browserconfig.xml')}}"/>
        <meta name="theme-color" content="#ffffff"/>
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
        <title>FREELANCE ARABIA | HOME</title>
</head>
@else
    <head>
        <meta charset="utf-8"/>
        <script defer src="https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js"></script>
        <script defer src="https://www.gstatic.com/firebasejs/7.24.0/firebase-messaging.js"></script>
        <script defer src="{{ asset('web_ar/js/fcm/firebase_ini.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('web_ar/js/fcm/fcm.js?v=2')}}" type="text/javascript"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="{{asset('web_ar/css/bootstrap.rtl.min.css')}}"/>
        {{--        <link href="{{asset('web_ar/css/bootstrap.min.css')}}" rel="stylesheet">--}}
        <link rel="stylesheet" href="{{asset('web_ar/css/style.css')}}"/>
        <script src="{{asset('web_ar/js/d0dbf24603.js')}}"></script>
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('web_ar/img/apple-touch-icon.png')}} "/>
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('web_ar/img/favicon-32x32.png')}}"/>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('web_ar/img/favicon-16x16.png')}}"/>
        <link rel="manifest" href=" {{asset('web_ar/img/site.webmanifest')}}"/>
        <link rel="mask-icon" href="{{asset('web_ar/img/safari-pinned-tab.svg')}}" color="#5bbad5"/>
        <link rel="shortcut icon" href="{{asset('web_ar/img/safari-pinned-tab.svg')}}"/>
        <link rel="stylesheet" href="{{asset('web_ar/vendor/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('web_en/js/tagify/tagify.css')}}">
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        <meta name="msapplication-TileColor" content="#da532c"/>
        <meta name="msapplication-config" content="img/browserconfig.xml"/>
        <meta name="theme-color" content="#ffffff"/>
        <title>الرئيسية</title>
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

        @endif
    </head>
    <body dir="{{$dir}}">
    <div class="site-container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('store.home')}}">
                    <img src="{{asset('web_ar/img/logo-lg.png')}} " class="logo-img" alt=""
                    /></a>
                <button class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul
                        class="
                navbar-nav
                me-auto
                ms-0 ms-lg-2 ms-xl-5
                mb-lg-0
                nav-menu-start">
                        {{--                        @if(!is_null($auth_user))--}}
                        {{--                            <li class="nav-item">--}}
                        {{--                                <a class="nav-link active"--}}
                        {{--                                   href="{{route('store.service_owner')}}">{{$labels['be_a_service_owner']}}</a>--}}
                        {{--                            </li>--}}
                        {{--                        @endif--}}
                        @if(getLang() =='ar')
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('switchLang','en')}}"
                                ><i class="fas fa-globe"></i>
                                    انجليزية
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('switchLang','ar')}}"
                                ><i class="fas fa-globe"></i>
                                    Arabic
                                </a>
                            </li>
                        @endif

                        <ul
                            class="
                                                        navbar-nav
                                                        me-auto
                                                        ms-0 ms-lg-2 ms-xl-5
                                                        mb-lg-0
                                                        nav-menu-start">
                            {{--                            @if(!is_null($auth_user))--}}
                            {{--                                @if($auth_user->service_owner == 1)--}}
                            {{--                                    <li class="nav-item">--}}
                            {{--                                        <a class="nav-link active" aria-current="page"--}}
                            {{--                                           href="{{route('store.service.create')}}"--}}
                            {{--                                        >{{$labels['add_service']}}</a--}}
                            {{--                                        >--}}
                            {{--                                    </li>--}}
                            {{--                                    <li class="nav-item">--}}
                            {{--                                        <a class="nav-link active" aria-current="page"--}}
                            {{--                                           href="{{route('store.order.show')}}"--}}
                            {{--                                        > {{$labels['incoming_orders']}}</a--}}
                            {{--                                        >--}}
                            {{--                                    </li>--}}
                            {{--                                    <li class="nav-item">--}}
                            {{--                                        <a class="nav-link active" aria-current="page"--}}
                            {{--                                           href="{{route('store.order.purchases')}}">--}}

                            {{--                                            {{$labels['purchases']}}</a>--}}
                            {{--                                    </li>--}}
                            {{--                                @else--}}

                            {{--                                    <li class="nav-item">--}}
                            {{--                                        <a class="nav-link active" aria-current="page"--}}
                            {{--                                           href="{{route('store.order.purchases')}}">--}}

                            {{--                                            {{$labels['purchases']}}</a>--}}
                            {{--                                    </li>--}}
                            {{--                                @endif--}}

                            {{--                            @endif--}}


                        </ul>

                        {{--                                        <li class="nav-item">--}}
                        {{--                                            <a class="nav-link active" aria-current="page" href="#"--}}
                        {{--                                            ><i class="fas fa-dollar-sign"></i>USD--}}
                        {{--                                            </a>--}}
                        {{--                                        </li>--}}
                    </ul>
                    {{--                    @if(!is_null($auth_user))--}}
                    {{--                        <div class="d-block d-lg-flex flex-end">--}}
                    {{--                            <ul class="navbar-nav ms-auto nav-menu-end">--}}

                    {{--                                <li class="nav-item mt-2 mt-lg-0" role="button">--}}
                    {{--                                    --}}{{--                                                 begin messages-dropdown--}}
                    {{--                                    <div class="dropdown custom-dropdown" id="cartDropdown">--}}
                    {{--                                        <div class="dropdown-toggle" data-bs-toggle="dropdown">--}}
                    {{--                                            <i--}}
                    {{--                                                class="--}}
                    {{--                                          fas--}}
                    {{--                                          fa-lg fa-shopping-cart--}}
                    {{--                                          mt-3--}}
                    {{--                                          me-4--}}
                    {{--                                          position-relative--}}
                    {{--                                        "--}}
                    {{--                                            >--}}
                    {{--                                                @if(count($user_cart)>0)--}}
                    {{--                                                    <span--}}
                    {{--                                                        class="--}}
                    {{--                                            position-absolute--}}
                    {{--                                            top-0--}}
                    {{--                                            translate-middle--}}
                    {{--                                            badge--}}
                    {{--                                            rounded-pill--}}
                    {{--                                            bg-danger--}}
                    {{--                                          "--}}
                    {{--                                                    >--}}
                    {{--                                          {{count($user_cart)}}--}}
                    {{--                                        </span>--}}
                    {{--                                                @endif--}}
                    {{--                                            </i>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div--}}
                    {{--                                            class="dropdown-menu"--}}
                    {{--                                            aria-labelledby="dropdownMenuButton"--}}
                    {{--                                        >--}}
                    {{--                                            <div class="custom-dropdown-list">--}}
                    {{--                                                --}}{{--                                                             begin messages-dropdown-list-item--}}
                    {{--                                                <div class="custom-dropdown-list-item row">--}}
                    {{--                                                    <div class="col-12 custom-dropdown-list-item-info">--}}
                    {{--                                                        @if($cart_items->count() >0)--}}
                    {{--                                                            @foreach($cart_items as $item)--}}
                    {{--                                                                <div class="custom-dropdown-list-item-title">--}}
                    {{--                                                                    <i class="fas fa-shopping-cart"></i>--}}
                    {{--                                                                    <a href="{{route('store.cart.show')}}">--}}
                    {{--                                                                        <span--}}
                    {{--                                                                            class="font-sm text-grey">{{$item->service->title}} </span>--}}
                    {{--                                                                    </a>--}}
                    {{--                                                                </div>--}}
                    {{--                                                            @endforeach--}}
                    {{--                                                        @endif--}}

                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                                --}}{{--                                                             end messages-dropdown-list-item --}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="custom-dropdown-all px-3 py-2">--}}
                    {{--                                                <i class="fas fa-shopping-cart"></i>--}}
                    {{--                                                <a href="{{route('store.cart.show')}}"><span--}}
                    {{--                                                        class="font-sm text-grey">{{$labels['view_cart']}} </span></a>--}}

                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <!-- end messages-dropdown -->--}}
                    {{--                                </li>--}}
                    {{--                                <li class="nav-item mt-2 mt-lg-0" role="button">--}}
                    {{--                                    <!-- begin messages-dropdown -->--}}
                    {{--                                    <div class="dropdown custom-dropdown" id="messagesDropdown">--}}
                    {{--                                        <div class="dropdown-toggle" data-bs-toggle="dropdown">--}}
                    {{--                                            <i--}}
                    {{--                                                class="--}}
                    {{--                                          fas--}}
                    {{--                                          fa-lg fa-envelope--}}
                    {{--                                          mt-3--}}
                    {{--                                          me-4--}}
                    {{--                                          position-relative--}}
                    {{--                                        "--}}
                    {{--                                            >--}}
                    {{--                                         <span--}}
                    {{--                                             class="--}}
                    {{--                                            position-absolute--}}
                    {{--                                            top-0--}}
                    {{--                                            translate-middle--}}
                    {{--                                            badge--}}
                    {{--                                            rounded-pill--}}
                    {{--                                            bg-danger--}}
                    {{--                                          "--}}
                    {{--                                         >--}}
                    {{--                                           1--}}
                    {{--                                        </span>--}}
                    {{--                                            </i>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"--}}
                    {{--                                             id="messages_id">--}}
                    {{--                                            <div class="custom-dropdown-list">--}}
                    {{--                                                @foreach($messages as $message)--}}

                    {{--                                                    <a href="{{route('store.contact.showMessages',$message->Sender->first()->id,auth('web')->user()->id)}}">--}}

                    {{--                                                        <!-- begin messages-dropdown-list-item -->--}}
                    {{--                                                        <div class="custom-dropdown-list-item row">--}}
                    {{--                                                            <div--}}
                    {{--                                                                class="--}}
                    {{--                                              col-2 col-sm-1 col-lg-3--}}
                    {{--                                              custom-dropdown-list-item-avatar--}}
                    {{--                                            "--}}
                    {{--                                                            >--}}
                    {{--                                                                <img src="{{asset('web_ar/img/default-avatar.jpg')}}"--}}
                    {{--                                                                     alt=""/>--}}
                    {{--                                                            </div>--}}
                    {{--                                                            <div--}}
                    {{--                                                                class="--}}
                    {{--                                              col-10 col-sm-9 col-lg-9--}}
                    {{--                                              custom-dropdown-list-item-info--}}
                    {{--                                            ">--}}
                    {{--                                                                <div class="custom-dropdown-list-item-title">--}}
                    {{--                                                                    {{$message->message}}--}}
                    {{--                                                                </div>--}}
                    {{--                                                                <div class="custom-dropdown-list-item-subtitle">--}}
                    {{--                                                                    <i class="far fa-clock"></i> {{time_elapsed_string($message->created_at)}}--}}
                    {{--                                                                </div>--}}
                    {{--                                                            </div>--}}
                    {{--                                                        </div>--}}
                    {{--                                                        <!-- end messages-dropdown-list-item -->--}}
                    {{--                                                    </a>--}}
                    {{--                                                @endforeach--}}
                    {{--                                            </div>--}}

                    {{--                                            <div class="custom-dropdown-all px-3 py-2">--}}
                    {{--                                                <i class="fas fa-envelope"></i>--}}
                    {{--                                                <a href="{{route('store.contact.show')}}"><span--}}
                    {{--                                                        class="font-sm text-grey"> {{$labels['all_messages']}} </span></a>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <!-- end messages-dropdown -->--}}
                    {{--                                </li>--}}
                    {{--                                <li class="nav-item mt-2 mt-lg-0" role="button">--}}
                    {{--                                    --}}{{--                                                 begin notifications-dropdown --}}
                    {{--                                    <div--}}
                    {{--                                        class="dropdown custom-dropdown"--}}
                    {{--                                        id="notificationsDropdown"--}}
                    {{--                                    >--}}
                    {{--                                        <div class="dropdown-toggle" data-bs-toggle="dropdown">--}}
                    {{--                                            <i class="fas fa-lg fa-bell mt-3 me-4 position-relative">--}}
                    {{--                                                @if(count($notifications))--}}
                    {{--                                                    <span--}}
                    {{--                                                        class="--}}
                    {{--                                            position-absolute--}}
                    {{--                                            top-0--}}
                    {{--                                            translate-middle--}}
                    {{--                                            badge--}}
                    {{--                                            rounded-pill--}}
                    {{--                                            bg-danger--}}
                    {{--                                          "--}}
                    {{--                                                    >--}}
                    {{--                                          {{count($notifications)}}--}}
                    {{--                                         </span>--}}

                    {{--                                                @endif--}}
                    {{--                                            </i>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div--}}
                    {{--                                            class="dropdown-menu"--}}
                    {{--                                            aria-labelledby="dropdownMenuButton"--}}
                    {{--                                        >--}}
                    {{--                                            <div class="custom-dropdown-list">--}}
                    {{--                                            @foreach(auth('web')->user()->unreadNotifications as $unreadNotification)--}}
                    {{--                                                @if($unreadNotification->data['type'] =='service_request')--}}
                    {{--                                                    <!-- begin notifications-dropdown-list-item -->--}}
                    {{--                                                        <a href="{{route('notification.markAsReadNotification',[$unreadNotification->data['item_id'],$unreadNotification->id])}}">--}}
                    {{--                                                            <div class="custom-dropdown-list-item row">--}}
                    {{--                                                                <div--}}
                    {{--                                                                    class="--}}
                    {{--                                                         col-2 col-sm-1 col-lg-3--}}
                    {{--                                              custom-dropdown-list-item-avatar--}}
                    {{--                                            "--}}
                    {{--                                                                >--}}
                    {{--                                                                    <img--}}
                    {{--                                                                        src="{{asset('web_ar/img/default-avatar.jpg')}}"--}}
                    {{--                                                                        alt=""/>--}}
                    {{--                                                                </div>--}}
                    {{--                                                                <div--}}
                    {{--                                                                    class="--}}
                    {{--                                              col-10 col-sm-9 col-lg-9--}}
                    {{--                                              custom-dropdown-list-item-info--}}
                    {{--                                            "--}}
                    {{--                                                                >--}}
                    {{--                                                                    <div class="custom-dropdown-list-item-title">--}}
                    {{--                                                                        {{$unreadNotification->data['title']}}--}}
                    {{--                                                                        / {{$unreadNotification->data['service_name']}}--}}
                    {{--                                                                    </div>--}}
                    {{--                                                                    <br>--}}
                    {{--                                                                    <div class="custom-dropdown-list-item-subtitle">--}}
                    {{--                                                                        <i class="far fa-clock"></i>{{time_elapsed_string($unreadNotification->created_at)}}--}}
                    {{--                                                                    </div>--}}
                    {{--                                                                </div>--}}
                    {{--                                                            </div>--}}
                    {{--                                                            <!-- end notifications-dropdown-list-item -->--}}
                    {{--                                                        </a>--}}
                    {{--                                                @elseif($unreadNotification->data['type'] =='service_order_accept')--}}
                    {{--                                                    <!-- begin notifications-dropdown-list-item -->--}}
                    {{--                                                        <a href="{{route('notification.markAsReadNotification',[$unreadNotification->data['item_id'],$unreadNotification->id])}}">--}}
                    {{--                                                            <div class="custom-dropdown-list-item row">--}}
                    {{--                                                                <div--}}
                    {{--                                                                    class="--}}
                    {{--                                                         col-2 col-sm-1 col-lg-3--}}
                    {{--                                              custom-dropdown-list-item-avatar--}}
                    {{--                                            "--}}
                    {{--                                                                >--}}
                    {{--                                                                    <img--}}
                    {{--                                                                        src="{{asset('web_ar/img/default-avatar.jpg')}}"--}}
                    {{--                                                                        alt=""/>--}}
                    {{--                                                                </div>--}}
                    {{--                                                                <div--}}
                    {{--                                                                    class="--}}
                    {{--                                              col-10 col-sm-9 col-lg-9--}}
                    {{--                                              custom-dropdown-list-item-info--}}
                    {{--                                            "--}}
                    {{--                                                                >--}}
                    {{--                                                                    <div class="custom-dropdown-list-item-title">--}}
                    {{--                                                                        {{$unreadNotification->data['title']}}--}}
                    {{--                                                                        / {{$unreadNotification->data['service_name']}}--}}
                    {{--                                                                    </div>--}}
                    {{--                                                                    <br>--}}
                    {{--                                                                    <div class="custom-dropdown-list-item-subtitle">--}}
                    {{--                                                                        <i class="far fa-clock"></i>{{time_elapsed_string($unreadNotification->created_at)}}--}}
                    {{--                                                                    </div>--}}
                    {{--                                                                </div>--}}
                    {{--                                                            </div>--}}
                    {{--                                                            <!-- end notifications-dropdown-list-item -->--}}
                    {{--                                                        </a>--}}
                    {{--                                                    @endif--}}
                    {{--                                                @endforeach--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="custom-dropdown-all px-3 py-2">--}}
                    {{--                                                <i class="fas fa-bell"></i>--}}
                    {{--                                                <a class="text-grey" href="{{route('notification.index')}}">--}}
                    {{--                                                    {{$labels['all_notifications']}}</a>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <!-- end notifications-dropdown -->--}}
                    {{--                                </li>--}}
                    {{--                                <li class="nav-item mt-2 mt-lg-0">--}}
                    {{--                                    <div class="dropdown custom-dropdown" id="profileDropdown">--}}
                    {{--                                        <div class="dropdown-toggle" data-bs-toggle="dropdown">--}}
                    {{--                                            <div class="avatar">--}}
                    {{--                                                <img--}}
                    {{--                                                    src="{{asset($auth_user->image)}}"--}}
                    {{--                                                    class="avatar-image"--}}
                    {{--                                                />--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}

                    {{--                                        <div--}}
                    {{--                                            class="dropdown-menu"--}}
                    {{--                                            aria-labelledby="dropdownMenuButton"--}}
                    {{--                                        >--}}
                    {{--                                            <a class="dropdown-item" href="{{route('store.service_owner')}}"--}}
                    {{--                                            ><i style="width: 35px" class="fas fa-fw fa-user"></i>--}}
                    {{--                                                {{auth('web')->user()->name}}</a--}}
                    {{--                                            >--}}
                    {{--                                            <a class="dropdown-item" href="{{route('store.settings.show')}}"></a>--}}

                    {{--                                            <a class="dropdown-item" href="{{route('store.settings.show')}}">--}}
                    {{--                                                <i style="width: 35px" class="fas fa-fw fa-cogs"></i>--}}
                    {{--                                                {{$labels['settings']}}</a>--}}

                    {{--                                            <a class="dropdown-item" href="{{route('store.common_questions')}}"--}}
                    {{--                                            ><i--}}
                    {{--                                                    style="width: 35px"--}}
                    {{--                                                    class="fas fa-fw fa-question"--}}
                    {{--                                                ></i>--}}
                    {{--                                                {{$labels['help']}}</a--}}
                    {{--                                            >--}}
                    {{--                                            <form method="POST" action="{{route('store.logout')}}">--}}
                    {{--                                                @csrf--}}
                    {{--                                                <button type="submit" class="dropdown-item">--}}
                    {{--                                                    <i style="width: 35px" class="fas fa-fw fa-sign-out-alt"></i>--}}
                    {{--                                                    {{$labels['logout']}}--}}
                    {{--                                                </button>--}}
                    {{--                                            </form>--}}

                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </li>--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}

                    {{--                    @else--}}
                    {{--                        <div class="d-block d-lg-flex flex-end">--}}
                    <ul class="navbar-nav ms-auto nav-menu-end">
                        {{--                                --}}{{--                                <li class="nav-item me-4">--}}
                        {{--                                --}}{{--                                    <button--}}
                        {{--                                --}}{{--                                        class="btn btn-outline-primary font-xs"--}}
                        {{--                                --}}{{--                                        data-bs-target="#LoginModal"--}}
                        {{--                                --}}{{--                                        data-bs-toggle="modal"--}}
                        {{--                                --}}{{--                                    >--}}
                        {{--                                --}}{{--                                        <i class="fas fa-sign-in-alt"></i>{{$labels['login']}}--}}
                        {{--                                --}}{{--                                    </button>--}}
                        {{--                                --}}{{--                                </li>--}}
                        <li class="nav-item me-4">
                            <a
                                class="btn btn-outline-primary font-xs"
                                target="_blank"
                                href="https://youtu.be/gVwgOxJOLWA"
                                style="text-align: center"
                            >
                                <i style="color: red" class="fab fa-youtube"></i>
                                {{$labels['watch_video']}}
                            </a>
                        </li>
                        <li class="nav-item mt-2 mt-lg-0">
                            <button
                                class="btn btn-primary font-xs"
                                data-bs-target="#SignupModal"
                                data-bs-toggle="modal"
                            >
                                <i class="fas fa-user-plus"></i>{{$labels['create_accont']}}
                            </button>
                        </li>


                    </ul>
                    {{--                        </div>--}}
                    {{--                    @endif--}}
                </div>

            </div>
        </nav>
        <!-- end nav -->

    {{--    @if(session()->has('alert-fails'))--}}
    {{--        <div class="alert alert-danger" style="margin-bottom:0;background-color: red" role="alert">--}}
    {{--            {{session()->get('alert-fails')}}--}}
    {{--        </div>--}}
    {{--@endif--}}
    {{--    @if ($errors->any())--}}
    {{--        <div class="alert alert-danger" style="margin-bottom:0;background-color: red">--}}
    {{--            <ul>--}}
    {{--                @foreach ($errors->all() as $error)--}}
    {{--                    <li>{{ $error }}</li>--}}
    {{--                @endforeach--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--@endif--}}
    <!-- begin main -->
        <!-- begin main -->
    <main dir="ltr">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="Terms mt-5 mb-5 bg-white border border-1" style="border-radius: 5px;padding: 30px 40px;">
                        <div class="header mb-4">
                            <h2 class="text-dark mb-0"><b>FreelancerArabic Privacy Policy</b> </h2>
                        </div>
                        <div class="descriptions">
                            <div class="describe">
                                <div class="describe1 mb-4">
                                    INFORMATION GATHERED BY <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a>. This is <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a>’s
                                    (“<a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a>”) online privacy policy (“Policy”). This policy applies only
                                    to activities <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> engages in on its website and does not apply to <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a>
                                    activities that are "offline" or unrelated to the website.
                                </div>

                                <div class="describe2 mb-4">
                                    <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> collects certain anonymous data regarding the usage of the website. This information
                                    does not personally identify users, by itself or in combination with other information, and is gathered to
                                    improve the performance of the website. The anonymous data collected by the <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> website can
                                    include information such as the type of browser you are using, and the length of the visit to the website.
                                    You may also be asked to provide personally identifiable information on the <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> website, which
                                    may include your name, address, telephone number and e-mail address. This information can be gathered when
                                    feedback or e-mails are sent to <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a>, when you register for services, or make purchases via the website.
                                    In all such cases you have the option of providing us with personally identifiable information.
                                </div>

                                <div class="describe3 ps-4 mb-4">
                                    <div class="Item1 mb-4">
                                        <h5 class="text-dark"> <b>1- USE AND DISCLOSURE OF INFORMATION:</b></h5>
                                        <ul>
                                            <li>
                                                Except as otherwise stated below, we do not sell, trade or
                                                rent your personally identifiable information collected on the site to others. The information
                                                collected by our site is used to process orders, to keep you informed about your order status, to notify
                                                you of products or special offers that may be of interest to you, and for statistical purposes for improving
                                                our site. We will disclose your Delivery information to third parties for order tracking purposes or process
                                                your check or money order, as appropriate, fill your order, improve the functionality of our site, perform statistical
                                                and data analyses deliver your order and deliver promotional emails to you from us. For example, we must release your
                                                mailing address information to the delivery service to deliver products that you ordered.
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="Item2 mb-4">
                                        <h5 class="text-dark"> <b>2- credit/debit cards’ details and personally:</b></h5>
                                        <ul>
                                            <li>
                                                All credit/debit cards’ details and personally identifiable information will NOT be stored, sold,
                                                shared, rented or leased to any third parties
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="describe4 mb-4">
                                    <h4 class="text-dark"><b>COOKIES.</b></h4>
                                    Cookies are small bits of data cached in a user’s browser. <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> utilizes cookies to determine
                                    whether or not you have visited the home page in the past. However, no other user information is gathered.
                                </div>
                                <div class="describe5 mb-4">
                                    <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> may use non-personal "aggregated data" to enhance the operation of our website, or analyze
                                    interest in the areas of our website. Additionally, if you provide <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> with content for publishing
                                    or feedback, we may publish your user name or other identifying data with your permission.
                                </div>
                                <div class="describe6 mb-4">
                                    <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> may also disclose personally identifiable information in order to respond to a subpoena, court order or
                                    other such request. <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> may also provide such personally identifiable information in response to a law enforcement
                                    agencies request or as otherwise required by law. Your personally identifiable information may be provided to a party if
                                    <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a>  files for bankruptcy, or there is a transfer of the assets or ownership of <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> in connection
                                    with proposed or consummated corporate reorganizations, such as mergers or acquisitions.
                                </div>

                                <div class="describe7 ps-4 mb-4">
                                    <div class="Item1 mb-4">
                                        <h5 class="text-dark"> <b>3- SECURITY:</b></h5>
                                        <ul>
                                            <li>
                                                <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> takes appropriate steps to ensure data privacy and security including through various hardware and
                                                software methodologies. However, <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> cannot guarantee the security of any information that is disclosed online.
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="Item2 mb-4">
                                        <h5 class="text-dark"> <b>4- OTHER WEBSITES:</b></h5>
                                        <ul>
                                            <li>
                                                <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> is not responsible for the privacy policies of websites to which it links. If you provide any information to
                                                such third parties different rules regarding the collection and use of your personal information may apply. We strongly suggest
                                                you review such third party’s privacy policies before providing any data to them. We are not responsible for the policies or practices
                                                of third parties. Please be aware that our sites may contain links to other sites on the Internet that are owned and operated by third parties. The information practices of those <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> linked to our site is not covered by this Policy. These other sites may send their own cookies or clear GIFs to users, collect data or solicit personally identifiable information. We cannot control this collection of information. You should contact these entities directly if you have any questions about their use of the information that they collect.
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="describe8 mb-4">
                                    <h4 class="text-dark"><b>MINORS.</b></h4>
                                    <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> does not knowingly collect personal information from minors under the age of 18. Minors are not permitted to use the
                                    <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> website or services, and <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> requests that minors under the age of 18 not submit any personal information
                                    to the website. Since information regarding minors under the age of 18 is not collected, <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> does not knowingly distribute personal
                                    information regarding minors under the age of 18.
                                </div>
                                <div class="describe9 mb-4">
                                    <h4 class="text-dark"><b>CORRECTIONS AND UPDATES.</b></h4>
                                    If you wish to modify or update any information <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> has received, please contact
                                    <a href="mailto:info@https://freelancearabia.ae"> info@https://freelancearabia.ae</a>.
                                </div>

                                <div class="describe10 ps-4 mb-4">
                                    <div class="Item1 mb-4">
                                        <h5 class="text-dark"> <b>5- MODIFICATIONS OF THE PRIVACY POLICY:</b></h5>
                                        <ul>
                                            <li>
                                                <a href=" https://freelancearabia.ae" target="_blank"> https://freelancearabia.ae </a> . The Website Policies and Terms & Conditions would be changed or updated occasionally to meet the
                                                requirements and standards. Therefore, the Customers are encouraged to frequently visit these sections in order to
                                                be updated about the changes on the website. Modifications will be effective on the day they are posted.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- begin footer -->
        </div>
        <footer class="footer">
            <div class="footer-wrapper row">
                <div class="col-12 col-md-4 footer-start">
                    <img src="{{asset('web_ar/img/logo-white.png')}} " class="footer-logo" alt=""/>
                    <br>
                    <br>
                    <div class="social-links">
                        <a href="https://twitter.com/FreelanceArabi1" rel="noopener noreferrer" target="_blank"
                           class="social-link">
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                        <a href="https://www.facebook.com/FreelanceArabia.ae" target="_blank" rel="noopener noreferrer"
                           class="social-link">
                            <i class="fab fa-facebook fa-2x"></i>
                        </a>
                        <a href="https://www.instagram.com/freelancearabia.ae/" target="_blank" rel="noopener noreferrer"
                           class="social-link">
                            <i class="fab fa-instagram fa-2x"></i>
                        </a>

                        <a href="https://www.linkedin.com/in/freelance-arabia-ba1353220/" target="_blank"
                           rel="noopener noreferrer" class="social-link">
                            <i class="fab fa-linkedin fa-2x"></i>
                        </a>
                    </div>
                    <div class="footer-payment">
                        <img
                            src="{{asset('web_ar/img/visa.png')}}"
                            alt="visa"
                            width="50px"
                        />
                        <img src=" {{asset('web_ar/img/mastercard.png')}}" alt="paypal" width="50px"/>
                        <img src=" {{asset('web_ar/img/unionpay.png')}}" alt="paypal" width="50px"/>
                    </div>
                </div>
                <div class="col-12 col-md-8 footer-end">
                    <div class="row">
                        <!-- begin footer-list -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <ul class="footer-list">
                                <li class="footer-list-item footer-list-title">{{$labels['entrepreneur']}}</li>
                                <li class="footer-list-item">
                                    <a href="{{route('store.common_questions')}}"
                                       class="footer-link"> {{$labels['common_questions_footer']}} </a>
                                </li>

                                <li class="footer-list-item">
                                    <a

                                        data-bs-target="#SignupModal"
                                        data-bs-toggle="modal"
                                    >
                                        <i class="footer-link"></i>{{$labels['subscribe']}}
                                    </a>
                                </li>

                                <li class="footer-list-item">
                                    <a href="mailto:info@freelancearabiauae.com"
                                       class="footer-link"> {{$labels['proposals']}} </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end footer-list -->
                        <!-- begin footer-list -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <ul class="footer-list">
                                <li class="footer-list-item footer-list-title">{{$labels['service_owner']}}</li>
                                <li class="footer-list-item">
                                    <a href="{{route('store.common_questions')}}"
                                       class="footer-link"> {{$labels['common_questions_footer']}} </a>
                                </li>
                                <li class="footer-list-item">
                                    <a

                                        data-bs-target="#SignupModal"
                                        data-bs-toggle="modal"
                                    >
                                        <i class="footer-link"></i>{{$labels['subscribe']}}
                                    </a>
                                </li>
                                <li class="footer-list-item">
                                    <a href="mailto:info@freelancearabiauae.com"
                                       class="footer-link"> {{$labels['proposals']}} </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end footer-list -->
                        <!-- begin footer-list -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <ul class="footer-list">
                                <li class="footer-list-item footer-list-title">
                                    <a href="{{route('store.about_us')}}" class="footer-link"> {{$labels['about_us']}}</a>
                                </li>
                                <li class="footer-list-item">
                                    <a href="{{route('store.privacy')}}"
                                       class="footer-link">{{$labels['privacy_policy']}} </a>
                                </li>
                                <li class="footer-list-item">
                                    <a href="{{route('store.terms_conditions')}}"
                                       class="footer-link"> {{$labels['terms_conditions']}} </a>
                                </li>
                                <li class="footer-list-item">
                                    <a

                                        data-bs-target="#ContactUsModal"
                                        data-bs-toggle="modal"
                                    >
                                        <i class="footer-link"></i>{{$labels['contact_us']}}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end footer-list -->
                    </div>
                </div>
                <hr/>
                <div class="col-12 text-end text-white" style="direction: ltr">
                    &copy; 2021 @if(getLang() =='ar') فريلانس عربية @else Freelance Arabia.com @endif
                    | {{$labels['rights_reserved']}}
                </div>
            </div>
        </footer>
        <!-- end footer -->

        <!-- begin signup-modal -->
        <div
            class="modal modal-blur fade"
            id="SignupModal"
            tabindex="-1"
            aria-labelledby="SignupModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="SignupModalLabel">
                            {{$labels['create_accont']}}
                        </h5>
                    </div>
                    <div class="modal-body">


                        <form action="{{route('store.register')}}" method="POST" class="requires-validation" novalidate>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session()->has('alert-fail-send-otp'))
                                <div class="alert alert-danger" role="alert">
                                    {{session()->get('alert-fail-send-otp')}}
                                </div>
                            @endif
                            @csrf
                            <div class="col-md-12">
                                <input
                                    class="form-control"
                                    type="email"
                                    name="user_email"
                                    placeholder="{{$labels['email']}}"
                                    required
                                />
                            </div>
                            <div class="col-md-12 mt-3">
                                <input
                                    class="form-control"
                                    type="text"
                                    name="user_name"
                                    placeholder=" {{$labels['username']}} "
                                    required
                                />
                            </div>

                            <div class="col-md-12 mt-3">
                                <input
                                    class="form-control"
                                    type="password"
                                    name="user_password"
                                    placeholder="{{$labels['pass']}}"
                                    required
                                />
                            </div>

                            <div class="col-12 text-white font-xl text-center mt-5 sideline">
                                <span>أو</span>
                            </div>

                            <div
                                class="col-12 d-flex justify-content-between mt-5 mx-auto w-50"
                            >
                                <a href="{{route('SocialAuth.redirect','google')}}"><img
                                        src="{{asset('web_ar/img/google.png')}}" alt=""/></a>
                                {{--                        <a href="#"><img src="{{asset('web_ar/img/apple.png')}} " alt="" /></a>--}}
                                <a href="#"><img src="{{asset('web_ar/img/facebook.png')}} " alt=""/></a>
                            </div>

                            <!--
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label">I confirm that all data are correct</label>
                         <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                        </div> -->

                            <div class="form-button mt-5">
                                <button
                                    type="submit"
                                    class="btn btn-primary w-100 btn-hover"
                                    data-bs-dismiss="modal" data-bs-toggle="modal" href="#VerifyEmailModal"
                                >
                                    {{$labels['create_accont']}}
                                </button>
                            </div>
                            <div class="col-12 mt-1 text-center text-white">
                                <span>{{$labels['joining_means_agreeing_to']}}</span>
                                <a href="{{route('store.terms_conditions')}}"> <b>{{$labels['terms_conditions']}}</b></a>
                            </div>
                            <div class="col-md-12 mt-5 text-white text-center">
                                <span>{{$labels['have_account']}}</span>
                                <!-- <span
                                  class="cursor-pointer"
                                  data-bs-toggle="modal"
                                  data-target="#LoginModal"
                                  ><b>تسجيل الدخول</b></span
                                > -->
                                <a data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#LoginModal"
                                   href="#"><b>{{$labels['login']}}</b></a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end signup-modal -->
        <!-- begin login-modal -->
        <div
            class="modal modal-blur fade"
            id="LoginModal"
            tabindex="-1"
            aria-labelledby="LoginModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="LoginModalLabel">{{$labels['login']}}</h5>
                    </div>

                    <div class="modal-body">
                        @if(session()->has('alert-fails'))
                            <div class="alert alert-danger" role="alert">
                                {{session()->get('alert-fails')}}
                            </div>
                        @endif
                        {{--                    <form class="requires-validation" novalidate method="POST" action="{{ route('store.login') }}">--}}
                        {{--                        @csrf--}}
                        {{--                        <div class="col-md-12">--}}
                        {{--                            <input--}}
                        {{--                                class="form-control"--}}
                        {{--                                type="email"--}}
                        {{--                                name="email"--}}
                        {{--                                placeholder="{{$labels['email']}}"--}}
                        {{--                                required--}}
                        {{--                            />--}}
                        {{--                        </div>--}}

                        {{--                        <div class="col-md-12 mt-3">--}}
                        {{--                            <input--}}
                        {{--                                class="form-control"--}}
                        {{--                                type="password"--}}
                        {{--                                name="password"--}}
                        {{--                                placeholder="{{$labels['pass']}}"--}}
                        {{--                                required--}}
                        {{--                            />--}}
                        {{--                        </div>--}}

                        {{--                        <div class="col-12 text-white font-xl text-center mt-5 sideline">--}}
                        {{--                            <span>{{$labels['or']}}</span>--}}
                        {{--                        </div>--}}

                        {{--                        <div--}}
                        {{--                            class="col-12 d-flex justify-content-between mt-5 mx-auto w-50"--}}
                        {{--                        >--}}
                        {{--                            <a href="{{route('SocialAuth.redirect','google')}}" target="_blank"><img--}}
                        {{--                                    src="{{asset('web_ar/img/google.png')}}" alt=""/></a>--}}
                        {{--                            --}}{{--                        <a href="{{route('SocialAuth.redirect','apple')}}"><img src="{{asset('web_ar/img/apple.png')}} " alt="" /></a>--}}
                        {{--                            <a href="{{route('SocialAuth.redirect','facebook')}}" target="_blank"><img--}}
                        {{--                                    src="{{asset('web_ar/img/facebook.png')}} " alt=""/></a>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="form-button mt-5">--}}
                        {{--                            <button--}}

                        {{--                                type="submit"--}}
                        {{--                                class="btn btn-primary w-100 btn-hover font-sm"--}}
                        {{--                            >--}}
                        {{--                                {{$labels['login']}}--}}
                        {{--                            </button>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-12 d-flex justify-content-between mt-1">--}}
                        {{--                            <label class="form-check-label text-white"--}}
                        {{--                            ><input--}}
                        {{--                                    class="form-check-input me-2"--}}
                        {{--                                    type="checkbox"--}}
                        {{--                                    value=""--}}
                        {{--                                    id="rememberMe"--}}
                        {{--                                />{{$labels['remember']}}</label--}}
                        {{--                            >--}}
                        {{--                            <a class="cursor-pointer text-white" data-bs-dismiss="modal" data-bs-toggle="modal"--}}
                        {{--                               href="#ForgotPasswordModal">--}}
                        {{--                                {{$labels['forgot_pass']}}--}}
                        {{--                            </a>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-md-12 mt-5 text-white text-center">--}}
                        {{--                            <span>{{$labels['dont_have_account']}}</span>--}}
                        {{--                            <!-- <span class="cursor-pointer"><b>أنشئ حساب جديد</b></span> -->--}}
                        {{--                            <a data-bs-dismiss="modal" role="button" data-bs-toggle="modal"--}}
                        {{--                               href="#SignupModal"><b>{{$labels['create_accont']}}</b></a>--}}
                        {{--                        </div>--}}
                        {{--                    </form>--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- end login-modal -->
        <!-- begin login-modal -->
        <div
            class="modal modal-blur fade"
            id="ContactUsModal"
            tabindex="-1"
            aria-labelledby="ContactUsLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="ContactUsLabel">{{$labels['contact_us']}}</h5>
                    </div>

                    <div class="modal-body">

                        <div class="requires-validation">

                            <div class="col-md-12">
                                <label class="form-check-label text-white">
                                    {{$labels['company_name']}}
                                </label>

                                <input class="form-control" placeholder="Free Lance Arabia Portal"
                                       disabled value="Free Lance Arabia Portal"
                                />
                            </div>

                            <div class="col-md-12">
                                <label class="form-check-label text-white">
                                    {{$labels['complete_address']}}
                                </label>

                                <textarea class="form-control" rows="3"
                                          disabled
                                />
                                Level 1, Al Bateen Tower C6 Bainunah , ADIB Building, Street 34 ,Abu Dhabi, United Arab
                                Emirates
                                </textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-check-label text-white">
                                    {{$labels['country']}}
                                </label>

                                <input class="form-control" placeholder="United Arab Emirates"
                                       disabled value="United Arab Emirates"
                                />
                            </div>

                            <div class="col-md-12">
                                <label class="form-check-label text-white">
                                    {{$labels['contact_nu']}}
                                </label>

                                <input class="form-control" placeholder=" +972521343040"
                                       disabled value=" +972521343040"
                                />
                            </div>

                            <div class="col-md-12">
                                <label class="form-check-label text-white">
                                    {{$labels['email']}}
                                </label>

                                <input class="form-control" placeholder=" info@freelancearabiauae.com"
                                       disabled value=" info@freelancearabiauae.com"
                                />
                            </div>

                            <br>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end login-modal -->
        <!-- begin login-modal -->

        <!-- end login-modal -->
        <!-- begin verify-email-modal -->
        <div
            class="modal modal-blur fade"
            id="VerifyEmailModal"
            tabindex="-1"
            aria-labelledby="VerifyEmailModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="VerifyEmailModalLabel">تفعيل الايميل</h5>
                    </div>
                    <div class="modal-body">
                        <div class="text-center text-white">
                            تم ارسال رمز التأكيد إليك من فضلك تحقق من الرسالة
                            أعد كتابة الكود
                        </div>
                        <form class="requires-validation" novalidate method="post"
                              action="{{route('store.email_verification')}}">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session()->has('alert-fails'))
                                <div class="alert alert-danger" role="alert">
                                    {{session()->get('alert-verify-email')}}
                                </div>
                            @endif
                            @csrf
                            <div class="col-md-12 mt-5">
                                <div class="text-center partitioned-input-outer">
                                    <div class="text-cente partitioned-input-inner form form-group">
                                        {{--                                <input type="email" name="verification_email" class="form-control" id="verification_email" value="{{old('verification_email')}}" >--}}
                                        <br>
                                        <input type="text" maxlength="4" name="verification_otp" class="partitioned-input"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-button mt-5">
                                <button
                                    {{--                            href="landing-buyer.html"--}}
                                    type="submit"
                                    class="btn btn-primary w-100 btn-hover font-sm"
                                >
                                    تسجيل الدخول
                                </button>
                            </div>

                            {{--                    <div class="col-md-12 mt-5 text-white text-center">--}}
                            {{--                        <span>لم يصلني كود التفعيل؟</span>--}}
                            {{--                        <!-- <span class="cursor-pointer"><b>أنشئ حساب جديد</b></span> -->--}}
                            {{--                        <a href="#"><b>اعد ارسال الكود</b></a>--}}
                            {{--                    </div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end verify-email-modal -->
        <!-- begin forgot-password-modal -->
        <div
            class="modal modal-blur fade"
            id="ForgotPasswordModal"
            tabindex="-1"
            aria-labelledby="ForgotPasswordModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="ForgotPasswordModalLabel">نسيت كلمة المرور</h5>
                    </div>
                    <div class="modal-body">
                        <div class="text-center text-white">
                            الرجاء إدخال عنوان بريدك الإلكتروني وسنرسل لك رابطاً لإعادة تعيين كلمة المرور الخاصة بك
                        </div>
                        <form class="requires-validation" novalidate>
                            <div class="col-md-12 mt-5">
                                <input
                                    class="form-control"
                                    type="text"
                                    name="email"
                                    type="email"
                                    placeholder="{{$labels['email']}}"
                                    required
                                />
                            </div>

                            <div class="form-button mt-5">
                                <button
                                    type="button"
                                    class="btn btn-primary w-100 btn-hover"
                                    data-bs-dismiss="modal" data-bs-toggle="modal" href="#ForgotPasswordCodeModal"
                                >
                                    ارسال
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end forgot-password-modal -->
        <!-- begin forgot-password-code-modal -->
        <div
            class="modal modal-blur fade"
            id="ForgotPasswordCodeModal"
            tabindex="-1"
            aria-labelledby="ForgotPasswordCodeModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="ForgotPasswordCodeModalLabel">نسيت كلمة المرور</h5>
                    </div>
                    <div class="modal-body">
                        <div class="text-center text-white">
                            تم ارسال رمز التأكيد إليك من فضلك تحقق من الرسالة
                            أعد كتابة الكود
                        </div>
                        <form class="requires-validation " novalidate>
                            <div class="col-md-12 mt-5 text-center">
                                <div class="text-center partitioned-input-outer">
                                    <div class="text-cente partitioned-input-inner">
                                        <input type="text" maxlength="4" class="partitioned-input"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-button mt-5">
                                <button
                                    type="button"
                                    class="btn btn-primary w-100 btn-hover"
                                    data-bs-dismiss="modal" data-bs-toggle="modal" href="#ForgotPasswordRecoverModal"

                                >
                                    استعادة كلمة المرور
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end forgot-password-code-modal -->
        <!-- begin forgot-password-recover-modal -->
        <div
            class="modal modal-blur fade"
            id="ForgotPasswordRecoverModal"
            tabindex="-1"
            aria-labelledby="ForgotPasswordRecoverModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="ForgotPasswordRecoverModalLabel">نسيت كلمة المرور</h5>
                    </div>
                    <div class="modal-body">
                        <div class="text-center text-white">
                            الرجاء إدخال عنوان بريدك الإلكتروني وسنرسل لك رابطاً لإعادة تعيين كلمة المرور الخاصة بك
                        </div>
                        <form class="requires-validation" novalidate>
                            <div class="col-md-12 mt-3">
                                <input
                                    class="form-control"
                                    type="password"
                                    name="password"
                                    placeholder="كلمة المرور الجديدة"
                                    required
                                />
                            </div>
                            <div class="col-md-12 mt-3">
                                <input
                                    class="form-control"
                                    type="password"
                                    name="password"
                                    placeholder="تأكيد كلمة المرور الجديدة"
                                    required
                                />
                            </div>

                            <div class="form-button mt-5">
                                <button

                                    data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#LoginModal"
                                    class="btn btn-primary w-100 btn-hover"
                                >
                                    استعادة كلمة المرور
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @yield('modals')
    <!-- end forgot-password-recover-modal -->
        <script src="{{asset('web_en/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('web_en/js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('web_en/vendor/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('web_en/js/main.js')}}"></script>
        <script src="{{asset('web_ar/js/d0dbf24603.js')}}"></script>
        <script src="{{asset('web_ar/js/tagify/jQuery.tagify.min.js')}}"></script>
        <script src="{{asset('web_ar/js/notify/notify.js')}}"></script>
        <script src="{{asset('web_ar/js/notify/notify.min.js')}}"></script>

        <script src="{{asset('web_ar/js/fcm/fcm.js?v=').time()}}')}}"></script>
        <script src="{{asset('web_ar/js/fcm/firebase_ini.js?v=').time()}}')}}"></script>
        {{--<script src="{{asset('web_ar/js/fcm/firebase-messaging-sw.js')}}"></script>--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
                integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        @yield('scripts')
        @if(session()->has('alert-fails'))
            <script>
                $(function () {
                    $('#LoginModal').modal(
                        'show'
                    );
                });
            </script>
        @endif
        @if(session()->has('alert-verification'))
            <script>
                $(function () {
                    $('#VerifyEmailModal').modal(
                        'show'
                    );
                });
            </script>
        @endif
        @if($errors->has('email') || $errors->has('password'))
            <script>
                $(function () {
                    $('#LoginModal').modal(
                        'show'
                    );
                });
            </script>
        @endif
        @if($errors->has('user_email') || $errors->has('user_password')|| $errors->has('user_name'))
            <script>
                $(function () {
                    $('#SignupModal').modal(
                        'show'
                    );
                })
            </script>
        @endif

        @if(session()->has('alert-fail-send-otp'))
            <script>
                $(function () {
                    $('#SignupModal').modal(
                        'show'
                    );
                })
            </script>
        @endif

        @if($errors->has('verification_otp') )
            <script>
                $(function () {
                    $('#VerifyEmailModal').modal(
                        'show'
                    );
                });
            </script>
        @endif

        @if(session()->has('alert-verify-email'))
            <script>
                $(function () {
                    $('#VerifyEmailModal').modal(
                        'show'
                    );
                });
            </script>
        @endif
        <script>
            // alert(window.location.href);
            // if (window.location.href == "http://localhost:8000/l=1"){
            //
            //      alert(window.location);
            //     $(function() {
            //         $('#LoginModal').modal(
            //             'show'
            //         );
            //     });
            // }
        </script>
        <script>
            $.ajaxSetup({
                'headers': {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });
        </script>
        </body>

        </html>

