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
<html  dir="rtl">
<head>
    @yield('style')
    @if($dir =='ltr')
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script defer src="https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js"></script>
        <script defer src="https://www.gstatic.com/firebasejs/7.24.0/firebase-messaging.js"></script>
        <script defer src="{{ asset('web_ar/js/fcm/firebase_ini.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('web_ar/js/fcm/fcm.js?v=2')}}" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="{{asset('web_en/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('web_en/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('web_en/css/newStyle.css')}}" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('web_en/img/apple-touch-icon.png')}} "/>
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('web_en/img/favicon-32x32.png')}}"/>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('web_en/img/favicon-16x16.png')}}"/>
        <link rel="manifest" href=" {{asset('web_en/img/site.webmanifest')}}" />
        <link rel="mask-icon" href="{{asset('web_en/img/safari-pinned-tab.svg')}}" color="#5bbad5" />
        <link rel="shortcut icon" href="{{asset('web_en/img/safari-pinned-tab.svg')}}" />

        <link rel="stylesheet" href="{{asset('web_en/vendor/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('web_en/js/tagify/tagify.css')}}">
        <link
            rel="stylesheet"
            href="https://unpkg.com/swiper/swiper-bundle.min.css"
        />

        @yield('style')
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta name="msapplication-config" content="{{asset('web_en/img/browserconfig.xml')}}" />
        <meta name="theme-color" content="#ffffff" />
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
        </style>
        <title>FREELANCE ARABIA | HOME</title>
</head>
@else
    <head>
        <meta charset="utf-8" />
        <script defer src="https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js"></script>
        <script defer src="https://www.gstatic.com/firebasejs/7.24.0/firebase-messaging.js"></script>
        <script defer src="{{ asset('web_ar/js/fcm/firebase_ini.js') }}" type="text/javascript"></script>
        <script defer src="{{ asset('web_ar/js/fcm/fcm.js?v=2')}}" type="text/javascript"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="{{asset('web_ar/css/bootstrap.rtl.min.css')}}"/>
        {{--        <link href="{{asset('web_ar/css/bootstrap.min.css')}}" rel="stylesheet">--}}
        <link rel="stylesheet" href="{{asset('web_ar/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('web_ar/css/newStyle.css')}}" />
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
        </style>

        @endif
    </head>
    <body dir="{{$dir}}">
    <div class="site-container">

        <main>
            <!-- begin banner -->
            <div class="section ">
                @include('web.home.nav')

                <div class="banne pt-3 px-4" style="">
                    <div class="jumbotron jumbotron-fluid mt-5 pt-2" style="
                    background-image: url('https://www.webemporium.in/wp-content/uploads/2016/02/graphic-design-banner.jpg');
    background-size: 100% 100%;
     background-repeat: no-repeat;
    height: 50vh;

    border-radius: 7px;
">


                        <div class="container">

                            <p class="lead">
                                @include('web.layouts.breadcrumbs')
                            </p>

                            {{--              <h1 class="display-4">Fluid jumbotron</h1>
                                          <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of
                                              its parent.</p>--}}
                        </div>
                    </div>
                </div>

            </div>
            <!-- end banner -->
            <div class="subcat ">
                <div class="container">
                    <div class="fillter row">
                        <div class="col-md-8 col-sm-12  d-flex">
                            <div class="dropdown my-3 mx-2">
                                <a class="aa btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    Service Options <i class="mt-1 fas fa-angle-down"></i>
                                </a>

                                <ul class="dropdown-menu  px-3 py-3" aria-labelledby="dropdownMenuLink">
                                    <div class="border-bottom">
                                        <P>Service Includes</P>
                                        <div class="d-flex justify-content-between my-2 px-3">
                                            <div class="form-check px-2">
                                                <input class="form-check-input" type="checkbox" value=""
                                                       id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Default checkbox
                                                </label>
                                            </div>
                                            <div class="form-check px-2">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                             <label class="form-check-label" for="flexCheckChecked">
                               Checked checkbox
                             </label>
                           </div>
                        </div>
                        <div class="d-flex justify-content-between my-2 px-3 ">
                         <div class="form-check px-2">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                             <label class="form-check-label" for="flexCheckDefault">
                               Default checkbox
                             </label>
                           </div>
                           <div class="form-check px-2">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                             <label class="form-check-label" for="flexCheckChecked">
                               Checked checkbox
                             </label>
                           </div>
                        </div>
                     </div>
                     <div class="border-bottom py-3">
                        <P>Service Includes</P>
                        <div class="d-flex justify-content-between my-2 px-3">
                         <div class="form-check px-2">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                             <label class="form-check-label" for="flexCheckDefault">
                               Default checkbox
                             </label>
                           </div>
                           <div class="form-check px-2">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                             <label class="form-check-label" for="flexCheckChecked">
                               Checked checkbox
                             </label>
                           </div>
                        </div>
                        <div class="d-flex justify-content-between my-2 px-3">
                         <div class="form-check px-2">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                             <label class="form-check-label" for="flexCheckDefault">
                               Default checkbox
                             </label>
                           </div>
                           <div class="form-check px-2">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                             <label class="form-check-label" for="flexCheckChecked">
                               Checked checkbox
                             </label>
                           </div>
                        </div>
                     </div>
                       <div class="bottom d-flex justify-content-between">
                           <a href="">clear all</a>
                           <a href="#" class="btn btn-primary">apply</a>
                       </div>
                        </ul>
                      </div>
                      <div class="dropdown my-3 mx-2">
                        <a class="aa btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Seller Details <i class="mt-1 fas fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu  px-3 py-3" aria-labelledby="dropdownMenuLink">
                     <div class="border-bottom">
                        <P>Service Includes</P>
                        <div class="d-flex justify-content-between my-2 px-3">
                         <div class="form-check px-2">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                             <label class="form-check-label" for="flexCheckDefault">
                               Default checkbox
                             </label>
                           </div>
                           <div class="form-check px-2">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                             <label class="form-check-label" for="flexCheckChecked">
                               Checked checkbox
                             </label>
                           </div>
                        </div>
                        <div class="d-flex justify-content-between my-2 px-3 ">
                         <div class="form-check px-2">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                             <label class="form-check-label" for="flexCheckDefault">
                               Default checkbox
                             </label>
                           </div>
                           <div class="form-check px-2">
                             <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                             <label class="form-check-label" for="flexCheckChecked">
                               Checked checkbox
                             </label>
                           </div>
                        </div>
                     </div>

                       <div class="bottom d-flex justify-content-between">
                           <a href="">clear all</a>
                           <a href="#" class="btn btn-primary">apply</a>
                       </div>
                        </ul>
                      </div>


                      <div class="dropdown budget my-3 mx-2">
                        <a class="aa btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Budget <i class="mt-1 fas fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuLink">
                     <div class="border-bottom">

                        <div class="d-flex justify-content-between my-2 px-3">
                            <div class="d-flex  row mx-2">
                                <label class="col-12">Min</label>
                                <input class="col-12" type="number" name="" placeholder="Any $">
                            </div>
                            <div class="d-flex  row mx-2">
                                <label class="col-12">Max</label>
                                <input class="col-12" type="number" name="" placeholder="Any $">
                            </div>
                        </div>
                     </div>

                       <div class="bottom py-2 d-flex justify-content-between">
                           <a href="">clear all</a>
                           <a href="#" class="btn btn-primary">apply</a>
                       </div>
                        </ul>
                      </div>

                      <div class="dropdown delivery my-3 mx-2">
                        <a class="aa btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Delivery Time <i class="mt-1 fas fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu  px-3 py-3" aria-labelledby="dropdownMenuLink">
                     <div class="border-bottom">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Default radio
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                              Default checked
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Default radio
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                              Default checked radio
                            </label>
                          </div>
                     </div>

                       <div class="bottom py-2 d-flex justify-content-between">
                           <a href="">clear all</a>
                           <a href="#" class="btn btn-primary">apply</a>
                       </div>
                        </ul>
                      </div>

                   </div>
                     <div class="col-md-4 col-sm-12  d-flex">
                        <div class="form-check form-switch mx-2 mt-4">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDisabled"  >
                            <label class="form-check-label" for="flexSwitchCheckDisabled">Local sellers</label>
                          </div>
                          <div class="form-check form-switch mx-2 mt-4">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDisabled" checked  >
                            <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Online sellers</label>
                          </div>

                     </div>

                </div>
                    <div class="row">
                        @if($services->count()>0)
                            @foreach( $services as $service)
                        <div class="my-2 col-md-3 col-sm-12">
                            <div class="card">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                    @foreach(\App\Models\Services\ServiceImages::where('service_id',$service->id)->get() as $image)
                                        <div class="swiper-slide">
                                            <a href="{{route('store.service.details',$service->id)}}">
                                                <img src="{{$image->image}} " class="" alt=""/>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-pagination"></div>
                                </div>
                                <!-- end swiper -->
                                <div class="down ">
                                    <div class="avatarr px-2 py-2">
                                        <img src="{{$service->ServiceOwner->image}}" class="avatar-image" />
                                        <a >{{$service->ServiceOwner->name}}</a>
                                    </div>
                                    <div class="desc px-2 py-2">
                                        <a href="#">{{$service->title}} </a>
                                    </div>
                                    <div class="d-flex justify-content-between px-2 pt-2">
                                        <p class="str pt-2 px-2">
                                            <span class="fa fa-star checked"></span>
                                            <span class=""> @php
                                                    $avarage_rate = \App\Models\Comments\ServicesComments::where('service_id',$service->id)->get()->pluck('rate')->toArray();
                                                if (!empty($avarage_rate)){
                           $avarage_rate =     array_sum($avarage_rate)/count($avarage_rate);
                           echo $avarage_rate;

                       }else{
                           $avarage_rate = 0;
                                     echo $avarage_rate;

                       }
                                                @endphp</span>
                                        </p>
                                        <ul class="p-0 d-flex">
                                            <li class="pt-1">
                                                <a href="{{route('store.user.add_fav',$service->id)}}">@if (in_array($service->id,\App\Models\User\UserFav::where('user_id',auth('web')->user()->id)->get()->pluck('service_id')->toArray()))<i style="color:  red" class="fas fa-heart"></i> @else <i style="color: #a7a5a5" class="fas fa-heart"> </i>@endif</a>

                                            </li>
                                            <li class="pt-1">
                                                <a href="#"><i class="fas fa-share" style="color: #a7a5a5"></i></a>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bar">
                                        <a href="{{route('store.service.details',$service->id)}}" class="btn w-100">service details</a>
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </div>
                            @endforeach
                            @endif
                    </div>
                </div>
            </div>

        </main>
    </div>
    <footer class="footer">
        <div class="footer-wrapper row">
            <div class="col-12 col-md-4 footer-start">
                <img src="{{asset('web_ar/img/logo-white.png')}} " class="footer-logo" alt="" />
                <br>
                <br>
                <div class="social-links">
                    <a href="https://twitter.com/FreelanceArabi1" rel="noopener noreferrer" target="_blank" class="social-link">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>
                    <a href="https://www.facebook.com/FreelanceArabia.ae" target="_blank" rel="noopener noreferrer" class="social-link">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                    <a href="https://www.instagram.com/freelancearabia.ae/" target="_blank" rel="noopener noreferrer" class="social-link">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>

                    <a href="https://www.linkedin.com/in/freelance-arabia-ba1353220/" target="_blank" rel="noopener noreferrer" class="social-link">
                        <i class="fab fa-linkedin fa-2x"></i>
                    </a>
                </div>
                <div class="footer-payment">
                    <img
                        src="{{asset('web_ar/img/visa.png')}}"
                        alt="visa"
                        width="50px"
                    />
                    <img src=" {{asset('web_ar/img/mastercard.png')}}" alt="paypal" width="50px" />
                    <img src=" {{asset('web_ar/img/unionpay.png')}}" alt="paypal" width="50px" />
                </div>
            </div>
            <div class="col-12 col-md-8 footer-end">
                <div class="row">
                    <!-- begin footer-list -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <ul class="footer-list">
                            <li class="footer-list-item footer-list-title">{{$labels['entrepreneur']}}</li>
                            <li class="footer-list-item">
                                <a href="{{route('store.common_questions')}}" class="footer-link"> {{$labels['common_questions_footer']}} </a>
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
                                <a href="mailto:info@freelancearabiauae.com" class="footer-link"> {{$labels['proposals']}} </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end footer-list -->
                    <!-- begin footer-list -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <ul class="footer-list">
                            <li class="footer-list-item footer-list-title">{{$labels['service_owner']}}</li>
                            <li class="footer-list-item">
                                <a href="{{route('store.common_questions')}}" class="footer-link"> {{$labels['common_questions_footer']}} </a>
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
                                <a href="mailto:info@freelancearabiauae.com" class="footer-link"> {{$labels['proposals']}} </a>
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
                                <a href="{{route('store.privacy')}}" class="footer-link">{{$labels['privacy_policy']}} </a>
                            </li>
                            <li class="footer-list-item">
                                <a href="{{route('store.terms_conditions')}}" class="footer-link"> {{$labels['terms_conditions']}} </a>
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
            <hr />
            <div class="col-12 text-end text-white" style="direction: ltr">
                &copy; 2021  @if(getLang() =='ar') فريلانس عربية @else Freelance Arabia.com @endif | {{$labels['rights_reserved']}}
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
                            <div class="alert alert-danger" >
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
                            <a href="{{route('SocialAuth.redirect','google')}}"><img src="{{asset('web_ar/img/google.png')}}"  alt="" /></a>
                            {{--                        <a href="#"><img src="{{asset('web_ar/img/apple.png')}} " alt="" /></a>--}}
                            <a href="#"><img src="{{asset('web_ar/img/facebook.png')}} " alt="" /></a>
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
                            <a  data-bs-toggle="modal"  data-bs-dismiss="modal" data-bs-target="#LoginModal" href="#"><b>{{$labels['login']}}</b></a>

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
                    <form class="requires-validation" novalidate method="POST" action="{{ route('store.login') }}">
                        @csrf
                        <div class="col-md-12">
                            <input
                                class="form-control"
                                type="email"
                                name="email"
                                placeholder="{{$labels['email']}}"
                                required
                            />
                        </div>

                        <div class="col-md-12 mt-3">
                            <input
                                class="form-control"
                                type="password"
                                name="password"
                                placeholder="{{$labels['pass']}}"
                                required
                            />
                        </div>

                        <div class="col-12 text-white font-xl text-center mt-5 sideline">
                            <span>{{$labels['or']}}</span>
                        </div>

                        <div
                            class="col-12 d-flex justify-content-between mt-5 mx-auto w-50"
                        >
                            <a href="{{route('SocialAuth.redirect','google')}}" target="_blank"><img src="{{asset('web_ar/img/google.png')}}"  alt="" /></a>
                            {{--                        <a href="{{route('SocialAuth.redirect','apple')}}"><img src="{{asset('web_ar/img/apple.png')}} " alt="" /></a>--}}
                            <a href="{{route('SocialAuth.redirect','facebook')}}" target="_blank"><img src="{{asset('web_ar/img/facebook.png')}} " alt="" /></a>
                        </div>

                        <div class="form-button mt-5">
                            <button

                                type="submit"
                                class="btn btn-primary w-100 btn-hover font-sm"
                            >
                                {{$labels['login']}}
                            </button>
                        </div>
                        <div class="col-12 d-flex justify-content-between mt-1">
                            <label class="form-check-label text-white"
                            ><input
                                    class="form-check-input me-2"
                                    type="checkbox"
                                    value=""
                                    id="rememberMe"
                                />{{$labels['remember']}}</label
                            >
                            <a class="cursor-pointer text-white" data-bs-dismiss="modal" data-bs-toggle="modal" href="#ForgotPasswordModal">
                                {{$labels['forgot_pass']}}
                            </a>
                        </div>
                        <div class="col-md-12 mt-5 text-white text-center">
                            <span>{{$labels['dont_have_account']}}</span>
                            <!-- <span class="cursor-pointer"><b>أنشئ حساب جديد</b></span> -->
                            <a data-bs-dismiss="modal" role="button" data-bs-toggle="modal" href="#SignupModal"><b>{{$labels['create_accont']}}</b></a>
                        </div>
                    </form>
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
                            Level 1, Al Bateen Tower C6 Bainunah , ADIB Building, Street 34 ,Abu Dhabi, United Arab Emirates
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
                    <form class="requires-validation" novalidate method="post" action="{{route('store.email_verification')}}">
                        @if ($errors->any())
                            <div class="alert alert-danger" >
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
                                    <input type="text" maxlength="4"  name="verification_otp" class="partitioned-input"/>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    @yield('scripts')

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            slidesPerGroup: 1,
            loop: true,

            loopFillGroupWithBlank: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

        });
    </script>
    <script type="text/javascript">
        $(window).scroll(function() {
            //After scrolling 100px from the top...
            if ( $(window).scrollTop() >= 100 ) {

                $(".navbar .white").css('display', 'none');
                $(".navbar .blue").css('display', 'block');
                $(".navbar .nav-menu-start .nav-item .nav-link").css('color', '#1875BC');
                $(".navbar").css('background-color', '#fff');
                $(".navdownlist").css('display', 'block');
                //Otherwise remove inline styles and thereby revert to original stying
            } else {
                $(".navbar .white").css('display', 'block');
                $(".navbar .blue").css('display', 'none');
                $(".navbar .nav-menu-start .nav-item .nav-link").css('color', '#fff');
                $(".navbar").css('background-color', '');
                $(".navdownlist").css('display', 'none');
            }
        });

    </script>

    @if(session()->has('alert-fails'))
        <script>
            $(function() {
                $('#LoginModal').modal(
                    'show'
                );
            });
        </script>
    @endif
    @if(session()->has('alert-verification'))
        <script>
            $(function() {
                $('#VerifyEmailModal').modal(
                    'show'
                );
            });
        </script>
    @endif
    @if($errors->has('email') || $errors->has('password'))
        <script>
            $(function() {
                $('#LoginModal').modal(
                    'show'
                );
            });
        </script>
    @endif
    @if($errors->has('user_email') || $errors->has('user_password')|| $errors->has('user_name'))
        <script>
            $(function() {
                $('#SignupModal').modal(
                    'show'
                );
            } )
        </script>
    @endif

    @if(session()->has('alert-fail-send-otp'))
        <script>
            $(function() {
                $('#SignupModal').modal(
                    'show'
                );
            } )
        </script>
    @endif

    @if($errors->has('verification_otp') )
        <script>
            $(function() {
                $('#VerifyEmailModal').modal(
                    'show'
                );
            } );
        </script>
    @endif

    @if(session()->has('alert-verify-email'))
        <script>
            $(function() {
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
            'headers':{
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
    </script>

    </body>

</html>


