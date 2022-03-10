<!-- begin banner -->
<div class="section  @yield('header_class')">
    @include('web.layouts.nav')


    @stack('more_header')


    {{--
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
                            --}}{{--    <span class="search-icon">
                <i class="fa fa-search"></i>
              </span>--}}{{--
                            <input
                                class="form-control"
                                type="search"
                                name="filter"
                                value="{{old('filter')}}"
                                placeholder="{{$labels['search']}}"

                                --}}{{--                                                                         placeholder="تطوير مواقع الكترونية"--}}{{--

                            />
                            <button class="btn btn-primary btn-lg" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        @if($rabdom_categories && count($rabdom_categories) )
                            <div class="most-requested">
                            <span class="most-requested-title"> {{$labels['most_wanted']}}
                            </span>
                                <div class="most-requested-list">
                                    @foreach($rabdom_categories as $cat)
                                        <div class="most-requested-item" onclick="location.href='{{route('store.ServicesBaseSubCategory',$cat->id)}}'">
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
                                    --}}{{--                                <img src="{{asset('/media/bg/globe-mobile.14616ad.jpg')}}" class="img-fluid">--}}{{--
                                    <img src="{{asset("/media/svg/sliders/vectors-0$num.svg")}}" class="img-fluid">
    --}}{{--                                <img src="{{asset('/media/bg/hero-instance-2--desktop@2x.webp')}}" class="img-fluid">--}}{{--
                                </div>
                            @endforeach
                        </div>
                        --}}{{--   <div class="swiper-button-next"></div>
                           <div class="swiper-button-prev"></div>
                           <div class="swiper-pagination"></div>--}}{{--
                        <div class="header_swiper_slider-pagination"></div>

                    </div>

                </div>

            </div>

        </div>

     --}}
</div>
