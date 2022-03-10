@extends('web.layouts.master')
@section('content')
    <br>
    <br>
    <!-- begin top-services -->
    <div class="top-services">
        <div class="owl-carousel top-services-carousel">
            @foreach($categories as $category)
                @if(getLang() =='ar')
                    <div class="item text-center">{{$category->name_ar}}</div>
                @else
                    <div class="item text-center">{{$category->name_en}}</div>
                @endif
            @endforeach

        </div>
    </div>
    <!-- end top-services -->


    <!-- begin main -->
    <main class="container-fluid">
        @if(session()->has('alert-success'))
            <div class="alert alert-success" style="text-align: center">{{session()->get('alert-success')}}</div>
    @endif
    <!-- begin welcome-banner -->
        <div class="section section-welcome-banner">
            <div class="row m-0">
                <div class="col-12 col-md-6 col-lg-4 section-welcome-banner-start ">
                    <h2>{{$labels['welcome'] .' '.auth('web')->user()->name}}
                    </h2>
                    <div class="mt-4">
                        {{$labels['get_the_service_you_want']}}
                    </div>
                    <div class="mt-4">
                        <form class="banner-search-form search-form d-flex" action="{{route('store.home_search')}}" method="get">
                            @csrf
                            <span class="search-icon">
                    <i class="fa fa-search"></i>
                  </span>
                            <input
                                class="form-control"
                                type="search"
                                placeholder="{{$labels['search']}}"
                                name="filter"
                            />
                            <button class="btn btn-primary btn-lg" type="submit"> {{$labels['search']}} </button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-8 section-welcome-banner-end pe-0 mt-3 mt-md-0 ps-0 ps-md-3">
                    <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            @foreach($home_sliders as $key => $home_slider)

                                <div class="carousel-item {{$key == 0 ? 'active' : '' }}"  style="height: 300px">
                                    <div class="welcome-image" style="background-image: url('{{asset($home_slider->image)}}');"></div>
                                    <div class="carousel-caption d-none d-md-block" style="color: black">
                                        <div class="welcome-title">
                                            <h5>
                                                @if(getLang() =='ar')
                                                    {{$home_slider->title_1_ar}}
                                                @else
                                                    {{$home_slider->title_1_en}}
                                                @endif
                                            </h5>
                                        </div>
                                        <div class="welcome-subtitle">
                                            <p>
                                                @if(getLang() =='ar')
                                                    {{$home_slider->title_2_ar}}
                                                @else
                                                    {{$home_slider->title_2_en}}
                                                @endif.</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <button hidden class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button hidden class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
        <!-- end welcome-banner -->

        <!-- begin new-services -->
        <div class="section section-new-services">
            <h2 class="text-start section-title">{{$labels['latest_services']}}</h2>

            <div class="subcat py-5">
                <div class="container">
                    <div class="row">
                        @if($latest_services->count()>0)
                            @foreach( $latest_services as $service)
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
                                            <div class="desc px-2">
                                                <a href="{{route('store.service.details',$service->id)}}">{{$service->title}} </a>
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
                                                        <a href="{{route('store.user.add_fav',$service->id)}}">@if (in_array($service->id,\App\Models\User\UserFav::where('user_id',auth('web')->user()->id)->get()->pluck('service_id')->toArray()))<i style="color:  red" class="fas fa-heart"></i> @else <i style=" color: #040404" class="fas fa-heart"> </i>@endif</a>

                                                    </li>
                                                    <li class="pt-1">
                                                        <a href="#"><i class="fas fa-share"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="d-flex justify-content-between px-2 pt-2">
                                                <p class="str pt-2 px-2">
                                                    <span ></span>
                                                </p>
                                                <ul class="p-0 d-flex">
                                                    <li class="pt-1"><a><i ></i></a></li>
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

        </div>
        <!-- end new-services -->

        <!-- begin recommended-services -->
        <div class="section section-recommended-services">
            <h2 class="text-start section-title">{{$labels['services_you_may_like']}}</h2>
            <div class="subcat py-5">
                <div class="container">
                    <div class="row">
                        @if($random_services->count()>0)
                            @foreach( $random_services as $service)
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
                                            <div class="desc px-2">
                                                <a href="{{route('store.service.details',$service->id)}}">{{$service->title}} </a>
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
                                                        <a href="{{route('store.user.add_fav',$service->id)}}">@if (in_array($service->id,\App\Models\User\UserFav::where('user_id',auth('web')->user()->id)->get()->pluck('service_id')->toArray()))<i style="color:  red" class="fas fa-heart"></i> @else <i style=" color: #040404" class="fas fa-heart"> </i>@endif</a>

                                                    </li>
                                                    <li class="pt-1">
                                                        <a href="#"><i class="fas fa-share"></i></a>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="d-flex justify-content-between px-2 pt-2">
                                                <p class="str pt-2 px-2">
                                                    <span ></span>
                                                </p>
                                                <ul class="p-0 d-flex">
                                                    <li class="pt-1"><a><i ></i></a></li>
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

        </div>
        <!-- end recommended-services -->

        <!-- begin faqs -->
        <div class="section section-faqs">
            <h2 class="text-start section-title">{{$labels['common_questions']}}</h2>
            <div class="accordion" id="accordionExample">
                @foreach($general_questions as $general_question)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$general_question->id}}" aria-expanded="true" aria-controls="collapseOne">
                                @if(getLang() =='ar')
                                    {{$general_question->question_ar}}
                                @else
                                    {{$general_question->question_en}}

                                @endif
                            </button>
                        </h2>
                        <div id="collapse_{{$general_question->id}}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @if(getLang() =='ar')
                                    {{$general_question->answer_ar}}
                                @else
                                    {{$general_question->answer_en}}

                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- end faqs -->
    </main>
    <!-- end main -->

@endsection
@section('scripts')
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
@endsection

