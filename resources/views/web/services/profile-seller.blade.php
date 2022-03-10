@extends('web.layouts.master')
@section('content')
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
        <div class="site-padding">
            <div class="row g-4">
                <div class="col-12  mt-5 ">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-12 col-md-2 ">
                                    <div class="avatar avatar-big">
                                        <img
                                            src="{{asset('web_ar/img/default-avatar.jpg')}}"
                                            class="avatar-image"
                                            alt=""
                                        />
                                    </div>
                                </div>
                                <div class="col-12 col-md-8 ">
                                    <div class="text-center text-md-start font-xl">
                                        {{auth('web')->user()->name}}
                                        <img src="{{asset('web_ar/img/verified.png')}}" alt="" class="ms-2">
                                    </div>
                                    <div class="text-center text-md-start mt-1">
                                        {{auth('web')->user()->work_title}}
                                    </div>
                                    <div class="text-center text-md-start mt-1">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{auth('web')->user()->country}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-2  mt-4 mt-md-0 text-center  text-md-end">
                                    <a href="{{route('profile.index')}}"
                                       class="btn btn-primary"> {{$labels['edit_profile']}} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 mt-4 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="custom-card mb-4">
                                <div class="custom-card-body">
                                    <div class="d-flex justify-content-between">
                                        <span class="font-md">
                                            {{$labels['description']}}
                                           </span>
                                           <span>
                                            <a href="{{route('profile.index')}}" class="text-grey"> <i class="fas fa-edit"></i></a>
                                            </span>
                                    </div>
                                    <div class="">
                                        <p class="py-3">
                                            {{auth('web')->user()->description}}
                                        </p>
                                        <p class="show-more cursor-pointer text-primary font-md">more</p>
                                    </div>
                                    {{-- <div class="d-flex justify-content-between">
                            <span class="font-md">
                             {{$labels['description']}}
                            </span>
                                        <span>
                            <a href="#" class="text-grey"> <i class="fas fa-edit"></i></a>
                            </span>
                                    </div>
                                    <div class="show-more-box">
                                        <p class="mt-3">
                                            {{auth('web')->user()->description}}
                                        </p>
                                        <p class="show-more cursor-pointer text-primary font-md">المزيد</p>
                                    </div> --}}
                                </div>


                            </div>
                            <div class="custom-card mb-4">
                                <div class="custom-card-body row  mx-0">
                                    <div class=" font-md mt-2 ">{{$labels['date_registration']}}</div>
                                    <div class=" mt-0 mt-sm-2  font-light">
                                        {{auth('web')->user()->created_at_readable }}</div>
                                    <div class=" font-md mt-2 ">{{$labels['last_seen']}}</div>
                                    <div class=" mt-0 mt-sm-2  font-light">
                                        {{time_elapsed_string(auth('web')->user()->logout_at)}}</div>
                                    <div class=" font-md mt-2  ">{{$labels['seller_rate']}}</div>
                                    <div class=" mt-0 mt-sm-2 font-light  text-warning">
                                        <i class="fas fa-star fa-xs"></i>
                                        <i class="fas fa-star fa-xs"></i>
                                        <i class="fas fa-star fa-xs"></i>
                                        <i class="fas fa-star fa-xs"></i>
                                        <i class="fas fa-star fa-xs"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-card mb-4">
                                <div class="custom-card-body">

                                    <div class="d-flex justify-content-between">
                          <span class="font-md">
                            {{$labels['skills']}}
                          </span>
                                        <span>
{{--                           <a href="#" class="text-grey"> <i class="fas fa-edit"></i></a>--}}
                          </span>
                                    </div>
                                    <div class="mt-2">
                                        @foreach($user_tags as $tag)
                                            <span class="badge bg-secondary cursor-pointer">{{$tag->tag}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="custom-card mb-4">
                                <div class="custom-card-body">

                                    <div class="d-flex justify-content-between">
                          <span class="font-md">
                            {{$labels['languages']}}
                          </span>
                                        <span>
{{--                           <a href="#" class="text-grey"> <i class="fas fa-edit"></i></a>--}}
                          </span>
                                    </div>
                                    <div class="mt-2">
                                        <span class="badge bg-secondary cursor-pointer">العربية</span>
                                        <span class="badge bg-secondary cursor-pointer">English</span>
                                    </div>
                                </div>
                            </div>
                            {{--                            <div class="custom-card mb-4">--}}
                            {{--                                <div class="custom-card-body">--}}

                            {{--                                    <div class="d-flex justify-content-between">--}}
                            {{--                          <span class="font-md">--}}
                            {{--                            الشهادات--}}
                            {{--                          </span>--}}
                            {{--                                        <span>--}}
                            {{--                           <a href="#" class="text-grey"> <i class="fas fa-edit"></i></a>--}}
                            {{--                          </span>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="mt-2" style="direction: ltr;">--}}
                            {{--                                        <div class="font-sm">--}}
                            {{--                                            <img src="{{asset('web_ar/img/adobe.png')}}" alt=""> <a href="#">Adobe Certified Expert</a>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="font-xs font-light">--}}
                            {{--                                            Demonstrates professional level in proficiency with one or more Adobe software products.--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}

                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="custom-card mb-2r">
                                <div class="custom-card-body">
                                    <div class="d-flex justify-content-between">
                          <span class="font-md">
                            {{$labels['education']}}
                          </span>
                                        <span>
{{--                           <a href="#" class="text-grey"> <i class="fas fa-edit"></i></a>--}}
                          </span>
                                    </div>
                                    <div class="mt-2">
                                        <div class="font-sm">
                                            {{auth('web')->user()->education}}
                                        </div>
                                        <div class="font-xs font-light">
                                            {{auth('web')->user()->university.' ' .'-'.' ' . date('Y', strtotime(auth('web')->user()->graduation_date))   }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8  mt-4 mb-3">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <div class="row pb-5">
                                <div class="font-md col-12 pb-3">
                                    {{$labels['service_models']}}
                                    <div class="">
                                        <div class="subcat py-5">
                                            <div class="container">
                                                <div class="font-md col-12 pb-3">
                                                    {{$labels['service_models']}}
                                                </div>
                                                <div class="row">
                                                    @if($services->count()>0)
                                                        @foreach( $services as $service)
                                                    <div class="my-2 col-md-6 col-sm-12">
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
                                                                <div class="desc px-2 pt-4 d-flex justify-content-between">
                                                                    <a href="#">{{$service->title}} </a>
                                                                    <p>${{$service->price}}</p>
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

                                        <div class="col-12 col-md-6 mt-3 px-2">
                                            <a class="">
                                                <div
                                                    class="py-5 service-create drop-shadow text-center h-100 d-flex flex-column justify-content-center ">
                                                    <div class="text-center py-3">
                                                        <a href="{{route('store.service.create')}}"
                                                           class="btn btn-primary btn-circle pt-2"><i
                                                                class="fas fa-plus pt-3"></i></a>
                                                        <div class="font-bold font-lg pt-2">
                                                            {{$labels['add_new_service']}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center my-5">


                        {{ $services->links('web.home.custom_paginate') }}

                    </div>
                </div>

            </div>
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
