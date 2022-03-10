@php
    $dir = getLang() === 'ar' ? 'rtl' : 'ltr';
    $auth_user = auth('web')->user();
    $categories = \App\Models\Category\Category::get();
    $labels = labels(['web.general']);

  if(!is_null($auth_user)){
        $messages = \App\Models\Messages\Messages::where('receiver_id',$auth_user->id)->with('Sender')->get()->take(5);
        $notifications =$auth_user->unreadNotifications;
        $user_cart = \App\Models\Cart\Cart::where('cart_id', getCartId())->get();
        $cart_items  = \App\Models\Cart\Cart::where('cart_id', getCartId())->with('service')->take(5)->get();
  }

@endphp

    <!DOCTYPE html>
<html dir="{{$dir}}">
<head>
    @include('web.layouts.head')

</head>

<body dir="{{$dir}}">
<div class="site-container">


@include('web.layouts.header')

{{--    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('store.home')}}"
            >
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
                        @if(!is_null($auth_user))
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('store.service_owner')}}">{{$labels['be_a_service_owner']}}</a>
                            </li>
                        @endif
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
                                                        nav-menu-start"
                        >@if(!is_null($auth_user))
                                @if($auth_user->service_owner == 1)
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{route('store.service.create')}}"
                                        >{{$labels['add_service']}}</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{route('store.order.show')}}"
                                        > {{$labels['incoming_orders']}}</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{route('store.order.purchases')}}">

                                            {{$labels['purchases']}}</a>
                                    </li>
                                @else

                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{route('store.order.purchases')}}">

                                            {{$labels['purchases']}}</a>
                                    </li>
                                @endif

                            @endif


                        </ul>

                        --}}{{--                                        <li class="nav-item">--}}{{--
                        --}}{{--                                            <a class="nav-link active" aria-current="page" href="#"--}}{{--
                        --}}{{--                                            ><i class="fas fa-dollar-sign"></i>USD--}}{{--
                        --}}{{--                                            </a>--}}{{--
                        --}}{{--                                        </li>--}}{{--
                    </ul>
                    @if(!is_null($auth_user))
                        <div class="d-block d-lg-flex flex-end">
                            <ul class="navbar-nav ms-auto nav-menu-end">

                                <li class="nav-item mt-2 mt-lg-0" role="button">
                                    --}}{{--                                                 begin messages-dropdown--}}{{--
                                    <div class="dropdown custom-dropdown" id="cartDropdown">
                                        <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <i
                                                class="
                                          fas
                                          fa-lg fa-shopping-cart
                                          mt-3
                                          me-4
                                          position-relative
                                        "
                                            >
                                                @if(count($user_cart)>0)
                                                    <span
                                                        class="
                                            position-absolute
                                            top-0
                                            translate-middle
                                            badge
                                            rounded-pill
                                            bg-danger
                                          "
                                                    >
                                          {{count($user_cart)}}
                                        </span>
                                                @endif
                                            </i>
                                        </div>
                                        <div
                                            class="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton"
                                        >
                                            <div class="custom-dropdown-list">
                                                --}}{{--                                                             begin messages-dropdown-list-item--}}{{--
                                                <div class="custom-dropdown-list-item row">
                                                    <div class="col-12 custom-dropdown-list-item-info">
                                                        @if($cart_items->count() >0)
                                                            @foreach($cart_items as $item)
                                                                <div class="custom-dropdown-list-item-title">
                                                                    <i class="fas fa-shopping-cart"></i>
                                                                    <a href="{{route('store.cart.show')}}">
                                                                        <span class="font-sm text-grey">{{$item->service->title}} </span>
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                                --}}{{--                                                             end messages-dropdown-list-item --}}{{--
                                            </div>
                                            <div class="custom-dropdown-all px-3 py-2">
                                                <i class="fas fa-shopping-cart"></i>
                                                <a href="{{route('store.cart.show')}}"><span class="font-sm text-grey">{{$labels['view_cart']}} </span></a>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end messages-dropdown -->
                                </li>
                                <li class="nav-item mt-2 mt-lg-0" role="button">
                                    <!-- begin messages-dropdown -->
                                    <div class="dropdown custom-dropdown" id="messagesDropdown">
                                        <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <i
                                                class="
                                          fas
                                          fa-lg fa-envelope
                                          mt-3
                                          me-4
                                          position-relative
                                        "
                                            >
                                         <span
                                             class="
                                            position-absolute
                                            top-0
                                            translate-middle
                                            badge
                                            rounded-pill
                                            bg-danger
                                          "
                                             id="header_manager_notifications_count"
                                         >
4
                                        </span>
                                            </i>
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="messages_id">
                                            <div class="custom-dropdown-list">
                                                @foreach($messages as $message)

                                                    <a href="{{route('store.contact.showMessages',$message->Sender->first()->id,auth('web')->user()->id)}}">

                                                        <!-- begin messages-dropdown-list-item -->
                                                        <div class="custom-dropdown-list-item row">
                                                            <div
                                                                class="
                                              col-2 col-sm-1 col-lg-3
                                              custom-dropdown-list-item-avatar
                                            "
                                                            >
                                                                <img src="{{asset('web_ar/img/default-avatar.jpg')}}" alt="" />
                                                            </div>
                                                            <div
                                                                class="
                                              col-10 col-sm-9 col-lg-9
                                              custom-dropdown-list-item-info
                                            ">
                                                                <div class="custom-dropdown-list-item-title">
                                                                    {{$message->message}}
                                                                </div>
                                                                <div class="custom-dropdown-list-item-subtitle">
                                                                    <i class="far fa-clock"></i> {{time_elapsed_string($message->created_at)}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end messages-dropdown-list-item -->
                                                    </a>
                                                @endforeach
                                            </div>

                                            <div class="custom-dropdown-all px-3 py-2">
                                                <i class="fas fa-envelope"></i>
                                                <a href="{{route('store.contact.show')}}"><span class="font-sm text-grey"> {{$labels['all_messages']}} </span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end messages-dropdown -->
                                </li>
                                <li class="nav-item mt-2 mt-lg-0" role="button">
                                    --}}{{--                                                 begin notifications-dropdown --}}{{--
                                    <div
                                        class="dropdown custom-dropdown"
                                        id="notificationsDropdown"
                                    >
                                        <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="fas fa-lg fa-bell mt-3 me-4 position-relative">
                                                @if(count($notifications))
                                                    <span
                                                        class="
                                            position-absolute
                                            top-0
                                            translate-middle
                                            badge
                                            rounded-pill
                                            bg-danger
                                          "
                                                    >
                                          {{count($notifications)}}
                                         </span>

                                                @endif
                                            </i>
                                        </div>
                                        <div
                                            class="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton"
                                        >
                                            <div class="custom-dropdown-list">
                                            @foreach(auth('web')->user()->unreadNotifications as $unreadNotification)
                                                @if($unreadNotification->data['type'] =='service_request')
                                                    <!-- begin notifications-dropdown-list-item -->
                                                        <a href="{{route('notification.markAsReadNotification',[$unreadNotification->data['item_id'],$unreadNotification->id])}}">
                                                            <div class="custom-dropdown-list-item row">
                                                                <div
                                                                    class="
                                                         col-2 col-sm-1 col-lg-3
                                              custom-dropdown-list-item-avatar
                                            "
                                                                >
                                                                    <img src="{{asset('web_ar/img/default-avatar.jpg')}}" alt="" />
                                                                </div>
                                                                <div
                                                                    class="
                                              col-10 col-sm-9 col-lg-9
                                              custom-dropdown-list-item-info
                                            "
                                                                >
                                                                    <div class="custom-dropdown-list-item-title">
                                                                        {{$unreadNotification->data['title']}} / {{$unreadNotification->data['service_name']}}
                                                                    </div>
                                                                    <br>
                                                                    <div class="custom-dropdown-list-item-subtitle">
                                                                        <i class="far fa-clock"></i>{{time_elapsed_string($unreadNotification->created_at)}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end notifications-dropdown-list-item -->
                                                        </a>
                                                @elseif($unreadNotification->data['type'] =='service_order_accept')
                                                    <!-- begin notifications-dropdown-list-item -->
                                                        <a href="{{route('notification.markAsReadNotification',[$unreadNotification->data['item_id'],$unreadNotification->id])}}">
                                                            <div class="custom-dropdown-list-item row">
                                                                <div
                                                                    class="
                                                         col-2 col-sm-1 col-lg-3
                                              custom-dropdown-list-item-avatar
                                            "
                                                                >
                                                                    <img src="{{asset('web_ar/img/default-avatar.jpg')}}" alt="" />
                                                                </div>
                                                                <div
                                                                    class="
                                              col-10 col-sm-9 col-lg-9
                                              custom-dropdown-list-item-info
                                            "
                                                                >
                                                                    <div class="custom-dropdown-list-item-title">
                                                                        {{$unreadNotification->data['title']}} / {{$unreadNotification->data['service_name']}}
                                                                    </div>
                                                                    <br>
                                                                    <div class="custom-dropdown-list-item-subtitle">
                                                                        <i class="far fa-clock"></i>{{time_elapsed_string($unreadNotification->created_at)}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end notifications-dropdown-list-item -->
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="custom-dropdown-all px-3 py-2">
                                                <i class="fas fa-bell"></i>
                                                <a class="text-grey" href="{{route('notification.index')}}">
                                                    {{$labels['all_notifications']}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end notifications-dropdown -->
                                </li>
                                <li class="nav-item mt-2 mt-lg-0">
                                    <div class="dropdown custom-dropdown" id="profileDropdown">
                                        <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="avatar">
                                                <img
                                                    src="{{asset($auth_user->image)}}"
                                                    class="avatar-image"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton"
                                        >
                                            <a class="dropdown-item" href="{{route('store.service_owner')}}"
                                            ><i style="width: 35px" class="fas fa-fw fa-user"></i>
                                                {{auth('web')->user()->name}}</a
                                            >
                                            <a class="dropdown-item" href="{{route('store.settings.show')}}"></a>

                                            <a class="dropdown-item" href="{{route('store.settings.show')}}">
                                                <i style="width: 35px" class="fas fa-fw fa-cogs"></i>
                                                {{$labels['settings']}}</a>

                                            <a class="dropdown-item" href="{{route('store.common_questions')}}"
                                            ><i
                                                    style="width: 35px"
                                                    class="fas fa-fw fa-question"
                                                ></i>
                                                {{$labels['help']}}</a
                                            >
                                            <form method="POST" action="{{route('store.logout')}}">
                                                @csrf
                                                <button  type="submit" class="dropdown-item">
                                                    <i style="width: 35px"class="fas fa-fw fa-sign-out-alt"></i>
                                                    {{$labels['logout']}}
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    @else
                        <div class="d-block d-lg-flex flex-end">
                            <ul class="navbar-nav ms-auto nav-menu-end">
                                <li class="nav-item me-4">
                                    <button
                                        class="btn btn-outline-primary font-xs"
                                        data-bs-target="#LoginModal"
                                        data-bs-toggle="modal"
                                    >
                                        <i class="fas fa-sign-in-alt"></i>{{$labels['login']}}
                                    </button>
                                </li>
                                --}}{{--                        <li class="nav-item me-4">--}}{{--
                                --}}{{--                            <a--}}{{--
                                --}}{{--                                class="btn btn-outline-primary font-xs"--}}{{--
                                --}}{{--                                target="_blank"--}}{{--
                                --}}{{--                                href="https://youtu.be/hMMTFfIgEEs"--}}{{--
                                --}}{{--                                style="text-align: center"--}}{{--
                                --}}{{--                            >--}}{{--
                                --}}{{--                                <i style="color: red" class="fab fa-youtube"></i>--}}{{--
                                --}}{{--                                {{$labels['watch_video']}}--}}{{--
                                --}}{{--                            </a>--}}{{--
                                --}}{{--                        </li>--}}{{--
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
                        </div>
                    @endif
                </div>
            </div>
        </nav>--}}
        <!-- end nav -->

        <!-- begin main -->
    {{--    <img src="{{asset('web_ar/img/comming-soon.jpg')}}">--}}
    @yield('content')
<!-- end main -->
    <!-- begin footer -->
</div>


@include('web.layouts.footer')

    <!-- end footer -->

@include('web.layouts.modal')





@include('web.layouts.script')



    </body>

</html>

