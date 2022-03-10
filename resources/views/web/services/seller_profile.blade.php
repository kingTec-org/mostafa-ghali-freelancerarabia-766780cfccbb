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
                                            src="{{asset($user->image)}}"
                                            class="avatar-image"
                                            alt=""
                                        />
                                    </div>
                                </div>
                                <div class="col-12 col-md-8 ">
                                    <div class="text-center text-md-start font-xl">
                                        {{$user->name}}
                                        <img src="{{asset('web_ar/img/verified.png')}}" alt="" class="ms-2">
                                    </div>
                                    <div class="text-center text-md-start mt-1">
                                        {{$user->work_title}}
                                    </div>
                                    <div class="text-center text-md-start mt-1">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{$user->country}}
                                    </div>
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
                            </span>
                                    </div>
                                    <div class="show-more-box">
                                        <p class="mt-3">
                                          {{$user->description}}
                                        </p>
                                        <p class="show-more cursor-pointer text-primary font-md">المزيد</p>
                                    </div>
                                </div>


                            </div>
                            <div class="custom-card mb-4">
                                <div class="custom-card-body row  mx-0">
                                    <div class=" font-md mt-2 ">{{$labels['date_registration']}}</div> <div class=" mt-0 mt-sm-2  font-light">
                                    {{$user->created_at_readable }}</div>
                                    <div class=" font-md mt-2 ">{{$labels['last_seen']}}</div> <div class=" mt-0 mt-sm-2  font-light">
                                    {{time_elapsed_string($user->logout_at)}}</div>
                                    <div class=" font-md mt-2  ">{{$labels['rate']}}</div>
                                    <div class=" mt-0 mt-sm-2 font-light  text-warning">
                                        @php
                                            $i='';
                                          $avarage_rate = $avarage_rate;
                                              for ($i==0 ;$i<=$avarage_rate-1 ;$i++){
                                            echo '<i class="fas fa-star"></i>';
                                              }
                                        @endphp
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
                            <div class="custom-card mb-2r">
                                <div class="custom-card-body">
                                    <div class="d-flex justify-content-between">
                          <span class="font-md">
                            {{$labels['education']}}
                          </span>
                    <span>
                          </span>
                                    </div>
                                    <div class="mt-2">
                                        <div class="font-sm">
                                            {{$user->education}}
                                        </div>
                                        <div class="font-xs font-light">
                                            {{$user->university.' ' .'-'.' ' . date('Y', strtotime(auth('web')->user()->graduation_date))   }}
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
                                    <div class="service-sample-wrapper row">
                                      @foreach($services as $service)
                                        <div class="col-12 col-md-6 mt-3 px-2">
                                            <div class="service-sample">
                                                <div id="carouselExampleControls" class="carousel slide w-100 drop-shadow rounded" data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @foreach(\App\Models\Services\ServiceImages::where('service_id',$service->id)->get() as $key => $slider)
                                                            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                                <img src=" {{asset($slider->image)}}" class="d-block w-100" alt="..." height="200px">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>

                                                <div class="font-bold font-md mt-3 px-3">
                                                    {{$service->title}}
                                                </div>
                                                <div class="font-bold font-md mt-3 px-3">
                                                    $ {{$service->price}}
                                                </div>
                                                <div>
                                                    <a href="{{route('store.service.details',$service->id)}}" class="btn btn-primary w-100 mt-3 font-sm service-sample-btn">
                                                            {{$labels['service_details']}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach

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
