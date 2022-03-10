@php
    $dir = getLang() === 'ar' ? 'rtl' : 'ltr';
    $auth_user = auth('web')->user();
    $sub_categories_ids = [];
    foreach (\App\Models\Category\Category::get()->pluck('id')->toArray() as $category){
        $sub_cat = \App\Models\Category\SubCategory::where('category_id',$category)->first();
        if (is_null($sub_cat)){
            continue;
        }
        array_push($sub_categories_ids , $sub_cat->id);
    }
    $categories = \App\Models\Category\SubCategory::whereIN('id',$sub_categories_ids)->get();
    $original_categories = \App\Models\Category\Category::get();
    $labels = labels(['web.general']);

  if(!is_null($auth_user)){
        $messages = \App\Models\Messages\Messages::where('receiver_id',$auth_user->id)->with('Sender')->get()->take(5);
        $notifications =$auth_user->unreadNotifications;
        $user_cart = \App\Models\Cart\Cart::where('user_id',$auth_user->id)->where('cart_id', getCartId())->get();
        $cart_items  = \App\Models\Cart\Cart::where('user_id',$auth_user->id)->where('cart_id', getCartId())->with('service')->take(5)->get();

  }

@endphp


@extends('web.layouts.master')
@push('style_css')
@endpush
@section('header_class' , ' section-banner')
@push('more_header')
    <div class="container pt-5">

        <div class="row">


            <div class="col-md-5  pt-5 offset-sm-12">
                <div class="header home_sidebar_header text-left pb-2 pt-5 font-weight-bold">
                    {{$labels['communicate_with_service']}}


                </div>
                <div
                    class="sub-header d-none d-sm-block text-left mt-2 ">{{$labels['here_you_will_find_freelance_services']}}</div>
                <div class="banner-search">

                    <form class="banner-search-form search-form d-flex mt-5" action="{{route('store.general_search')}}"
                          method="post">
                        @csrf
                        {{--    <span class="search-icon">
            <i class="fa fa-search"></i>
          </span>--}}
                        <input
                            class="form-control"
                            type="search"
                            name="filter"
                            value="{{old('filter')}}"
                            placeholder="{{$labels['search']}}"

                            {{--                                                                         placeholder="تطوير مواقع الكترونية"--}}

                        />
                        <button class="btn btn-primary btn-lg" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    @if($rabdom_categories && count($rabdom_categories) )
                        <div class="most-requested">
                        <span class="most-requested-title"> {{$labels['most_wanted']}}
                        </span>
                            <div class="most-requested-list">
                                @foreach($rabdom_categories as $cat)
                                    <div class="most-requested-item"
                                         onclick="location.href='{{route('store.ServicesBaseSubCategory',$cat->id)}}'">
                                        @if(getLang() =='ar')
                                            {{$cat->name_ar}}
                                        @else
                                            {{$cat->name_en}}
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

            </div>

            <div class="col-md-7  header_img_section  pt-2">
                <div class="swiper header_swiper_slider">
                    <div class="swiper-wrapper  ">
                        @foreach(range(1,7) as $num)
                            <div class="swiper-slide">
                                {{--                                <img src="{{asset('/media/bg/globe-mobile.14616ad.jpg')}}" class="img-fluid">--}}
                                <img src="{{asset("/media/svg/sliders/vectors-0$num.svg")}}" class="img-fluid">
                                {{--                                <img src="{{asset('/media/bg/hero-instance-2--desktop@2x.webp')}}" class="img-fluid">--}}
                            </div>
                        @endforeach
                    </div>
                    {{--   <div class="swiper-button-next"></div>
                       <div class="swiper-button-prev"></div>
                       <div class="swiper-pagination"></div>--}}
                    <div class="header_swiper_slider-pagination"></div>

                </div>

            </div>

        </div>

    </div>

@endpush
@section('content')

    <main>
        {{--        @include('web.home.header')--}}


        <div class="subcatigory container-fluid my-4 py-5">
            <h3 class="pb-4 px-4 ">Popular professional services </h3>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach($categories as $category)
                        <div class="swiper-slide">
                            <a href="{{route('store.ServicesBaseSubCategory',$category->id)}}">
                                <img src="{{asset($category->image)}} " class="" alt=""/>
                                <div>
                                    @if(getLang() =='ar')
                                        <h4>{{$category->name_ar}} </h4>
                                    @else
                                        <h4>{{$category->name_en}} </h4>

                                    @endif

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- end subcatigory -->

        <div class="freelancer_video container-fluid">
            <div class="row px-3 pt-2">
                <div class="col-md-5 col-sm-12 left">
                    <h2 class="mb-4">There's a whole world of talent waiting for you</h2>

                    @foreach(['Exceptional fee rates',"Middle East's largest market" , "First freelance portal with the option of a monthly subscription fee-free"] as $one)

                        <div class="py-2  px-2">
                            <h5 class="d-flex">

                                <div class="px-2">
                                    <img class=" " src="{{asset('web_en/img/apple-touch-icon.png')}}">

                                </div>
                                <div>
                                    {{$one}}

                                </div>


                            </h5>
                            {{--                           <p class="px-2">Find high-quality services at every price point. No hourly rates, just project-based pricing.</p>--}}
                        </div>
                    @endforeach
                </div>
                <div class="col-md-7 col-sm-12 ">
                    <div class="video_play">
                        <div class="auto_play_section">
                            <div class="auto_play_icon">
                                <i class="fa fa-play"></i>


                            </div>
                        </div>

                        <img src="{{asset('media/video_img.jpeg')}}" class="img-fluid">
                    </div>
                    {{--                        <video  src="{{asset('media/Freelance_Arabia_Platform.mp4')}}" controls class="mt-3" width="100%" height="400"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></video>--}}
                    {{--                        <iframe class="mt-3" width="100%" height="400" src="https://www.youtube.com/embed/gVwgOxJOLWA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                </div>

            </div>
        </div>

        <!-- end freelancer_video -->
        <!-- begin how-it-works -->
        <div class="section section-how-it-works">
            <h2 class="text-center section-title">
                {{$labels['whole_world_of_premium_services']}}
            </h2>
            <!-- begin content-boxes -->
            <div class="content-boxes">
                <!-- begin box -->
                <div class="box">
                    <div class="box-image">
                        <img src="{{asset('web_ar/img/box-3.png')}}" alt=""/>
                    </div>
                    <div class="box-title">{{$labels['implement_your_projects']}}</div>
                    <div class="box-content">{{$labels['choose_your_service_according']}}</div>
                </div>
                <!-- end box -->
                <!-- begin box -->
                <div class="box">
                    <div class="box-image">
                        <img src="{{asset('web_ar/img/box-2.png')}}" alt=""/>
                    </div>
                    <div class="box-title">{{$labels['get_your_work_done_quickly']}}</div>
                    <div class="box-content">
                        {{$labels['choose_the_right_freelancer_to_get']}}
                    </div>
                </div>
                <!-- end box -->
                <!-- begin box -->
                <div class="box">
                    <div class="box-image">
                        <img src="{{asset('web_ar/img/box-1.png')}}" alt=""/>
                    </div>
                    <div class="box-title">{{$labels['guaranteed_payment_method']}}</div>
                    <div class="box-content">{{$labels['dont_pay_until_you_agree_to_work']}}</div>
                </div>
                <!-- end box -->
            </div>
            <!-- end content-boxes -->
        </div>
        <!-- end how-it-works -->

        <!-- begin services -->
        <div class="section section-services">
            <h2 class="text-center text-white section-title">{{$labels['service_sections']}}</h2>
            <div class="service-list">
                <div class="content-boxes">
                @foreach($original_categories as $category)
                    <!-- begin box -->


                        <div class="box"
                             onclick="document.location='{{route('store.ServicesBaseSubCategory',$category)}}'">
                            <div class="box-image">
                                <img width="80px" height="80px" style="border-radius: 25px"
                                     src="{{asset($category->image)}}" alt=""/>
                            </div>
                            @if(getLang() =='ar')
                                <div class="box-title">{{$category->name_ar}}</div>
                            @else
                                <div class="box-title">{{$category->name_en}}</div>

                            @endif
                        </div>
                        <!-- end box -->
                    @endforeach

                </div>
            </div>
        </div>
        <!-- end services -->

        <div class="section section-start-now text-center">
            <div class="start-now-wrapper row">
                <div class="col-12 col-md-12 col-lg-12">
                    <h2 class="d-inline">{{$labels['find_the_talent_needed_to_grow']}}</h2>
                </div>
                <div class="col-12 col-md-12 col-lg-12 text-center mt-3">
                    <button data-bs-target="#SignupModal" data-bs-toggle="modal" href="#"
                            class="btn btn-primary bold">{{$labels['start_now']}}</button>
                </div>
            </div>
        </div>
        <!-- end start-now -->
    </main>
@endsection


