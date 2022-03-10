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
    <div class="container-fluid">

        <div class="row site-padding g-4">
            <div class="custom-card-header">
                @if(session()->has('alert-success'))
                    <div class="alert alert-success"
                         style="text-align: center">{{session()->get('alert-success')}}</div>
                @endif

            </div>
            @if ($errors->any())
                <div class="alert alert-danger" style="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-12 mt-5">
                <div class="custom-card">
                    <div class="custom-card-body">
                        <div class="row ">
                            <div class="col-2 col-xxl-1 d-none d-md-block ">
                                <div class="avatar avatar-big">
                                    <img
                                        src=" {{asset('web_ar/img/default-avatar.jpg')}}"
                                        class="avatar-image"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="col-12 col-md-8 col-xxl-7 ">
                                <div class="text-primary font-xl">
                                    {{$service->title}}
                                </div>
                                <div class="mt-3">
                      <span class="font-light me-2 d-block d-xl-inline"
                      ><i class="far fa-fw fa-clock me-1"></i> {{time_elapsed_string($service->created_at)}}</span
                      >
                                    <span class="font-light me-2 d-block d-xl-inline"
                                    ><i class="fas fa-fw fa-user me-1"></i>{{$service_owner->name}}</span
                                    >

                                    <span class="font-light me-2 d-block d-xl-inline"
                                    ><i class="fas fa-fw fa-bars me-1"></i>{{$service->SubCategory->name_ar}}
                        إبداعية</span
                                    >
                                </div>
                            </div>
                            <div class="col-12 col-md-2 col-xxl-4  mt-4 mt-md-0  text-end">
                                {{--                                <a href="contact-seller.html" class="btn btn-primary"> تواصل مع صاحب الخدمة </a>--}}
                                <a href="{{route('store.contact.send.show',$service->id)}}" class="btn btn-primary">
                                    {{$labels['contact_service_owner']}} </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-9 mt-4">
                <div class="custom-card">
                    <div class="custom-card-body">
                        <div class="row">
                            <div class="col-12">

                                <div id="carouselExampleControls" class="carousel slide w-100 drop-shadow rounded"
                                     data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($service_images as $key => $slider)
                                            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                <img src=" {{asset($slider->image)}}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                                <p class="mt-3">
                                    {{$service->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3 mt-4">
                <div class="custom-card">
                    <div class="custom-card-body">
                        <div class="row">
                            <div class="bottom-border">
                                <div class="p-2 font-xl font-light"> {{$labels['service_rating']}}</div>
                            </div>
                            <div class="mt-3 text-start text-warning">
                                @php
                                    $i='';
                                  $avarage_rate = $avarage_rate;
                                      for ($i==0 ;$i<=$avarage_rate-1 ;$i++){
                                    echo '<i class="fas fa-star"></i>';
                                      }

                                @endphp

                            </div>
                            <div class="mt-3">
                                <i class="fas fa-redo-alt"></i> {{$labels['response_speed']}}
                                : {{$service_owner->response_speed .' '.$labels['hours']}}
                                {{--                                <i class="fas fa-redo-alt"></i> {{$labels['response_speed']}} : {{count(\App\Models\Messages\Messages::where('receiver_id',$service_owner->id)->get()->pluck('id')->toArray()) == 0 ? 0 : rand(3,9) .' '.$labels['hours']}}--}}

                            </div>
                            {{--                            <div class="my-3">--}}
                            {{--                                <i class="fas fa-shopping-cart"></i> اشتروا هذه الخدمة--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>

            @if(count($addtional_services) >0)
                <div class="col-12 col-lg-9 mt-4">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-12 text-primary font-xl">{{$labels['additional_services']}}</div>
                            @foreach($addtional_services as $add_service)
                                <!-- begin additional-service -->
                                    <div class="row bottom-border py-3">
                                        <div class="col-12 col-sm-4">
                                            <label><input
                                                    class="form-check-input me-2"
                                                    type="hidden"
                                                    value=""
                                                />
                                                {{$add_service->title}}
                                            </label
                                            >
                                        </div>
                                        <div class="col-6 col-sm-4 text-center">{{$add_service->additional_days}}يوم
                                        </div>
                                        <div class="col-6 col-sm-4 text-center">+{{$add_service->price}} $</div>
                                    </div>
                                    <!-- end additional-service -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        <div class="d-none d-lg-block col-3"></div>
        @endif
        <div class="col-12 col-lg-9 mt-4">
            @if($service->user_id != auth('web')->user()->id)
                <div class="custom-card">
                    <div class="custom-card-body">
                        <form action="{{route('store.cart')}}" method="POST" id="store_cart"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="service_id" value="{{$service->id}}">

                            <div class="row">
                                <div class="col-12 text-primary font-xl">{{$labels['add_to_cart']}}</div>
                                <div class="col-6 col-sm-3 mt-4">{{$labels['number_times']}}</div>
                                <div class="col-6 col-sm-9 mt-4">
                                    <input type="number" class="form-control" name="quantity">
                                </div>
                                <div class="col-6 col-sm-3 mt-4">{{$labels['some_help']}}</div>
                                <div class="col-6 col-sm-9 mt-4">
                                    <textarea class="form-control" name="notes"></textarea>
                                </div>
                                <div class="col-6 col-sm-3 mt-4">{{$labels['attachment']}}</div>
                                <div class="col-6 col-sm-9 mt-4">
                                    <input type="file" accept="image/png,image/jpeg,image/jpg,application/pdf"
                                           class="form-control" name="attachment">
                                </div>

                                <div class="col-12 mt-4 text-end">
                                    <button class="btn btn-primary" type="submit">{{$labels['add_to_cart']}}</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            @endif
        </div>

        <div class="d-none d-lg-block col-3"></div>

        <div class="col-12 col-lg-9 mt-4">
            <div class="custom-card">
                <div class="custom-card-body">
                    <div class="row">
                        <div class="col-12 text-primary font-xl">{{$labels['common_questions']}}</div>
                        <div class="col-12">
                            <div class="accordion" id="accordionExample">
                                @foreach($service_questions  as $q)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading_{{$q->id}}">
                                            <button
                                                class="accordion-button ps-0"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne"
                                                aria-expanded="true"
                                                aria-controls="collapseOne">
                                                {{$q->question}}
                                            </button>
                                        </h2>
                                        <div
                                            id="collapseOne"
                                            class="accordion-collapse collapse show"
                                            aria-labelledby="heading_{{$q->id}}"
                                            data-bs-parent="#accordionExample"
                                        >
                                            <div class="accordion-body">
                                                {{$q->answer}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{--                                    --}}
                                {{--                                    <div class="accordion-item">--}}
                                {{--                                        <h2 class="accordion-header" id="headingTwo">--}}
                                {{--                                            <button--}}
                                {{--                                                class="accordion-button ps-0 collapsed"--}}
                                {{--                                                type="button"--}}
                                {{--                                                data-bs-toggle="collapse"--}}
                                {{--                                                data-bs-target="#collapseTwo"--}}
                                {{--                                                aria-expanded="false"--}}
                                {{--                                                aria-controls="collapseTwo"--}}
                                {{--                                            >--}}
                                {{--                                                ما هو نوع الملف المستلم في النهاية؟--}}
                                {{--                                            </button>--}}
                                {{--                                        </h2>--}}
                                {{--                                        <div--}}
                                {{--                                            id="collapseTwo"--}}
                                {{--                                            class="accordion-collapse collapse"--}}
                                {{--                                            aria-labelledby="headingTwo"--}}
                                {{--                                            data-bs-parent="#accordionExample"--}}
                                {{--                                        >--}}
                                {{--                                            <div class="accordion-body">--}}
                                {{--                                                يوفر لك الموقع إمكانية البحث عن خدمتك، كإنشاء موقع ويب--}}
                                {{--                                                أو تطبيق جوال أو حتى تصميم شعار وتتصفح الخدمات المعروضة،--}}
                                {{--                                                وتختار المناسب لك. ثم تتواصل مع صاحب الخدمة للاتفاق على--}}
                                {{--                                                التفاصيل،تتولى المتابعة معه حتى إتمام تنفيذ مشروعك--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-lg-block col-3"></div>

        <div class="col-12 col-lg-9 mt-4">
            <div class="custom-card">
                <div class="custom-card-body">
                    <div class="row">
                        <div class="col-12 text-primary font-xl mb-3">{{$labels['buyers_reviews']}}</div>
                        <div class="col-12">
                            <div class="comments">
                                @if(!is_null($service_comments) && count($service_comments)>0)
                                    @foreach($service_comments as $comment)
                                        <div class="comment-item py-3 bottom-border">
                                            <div class="comment-main">
                                                <div class="comment-user row">
                                                    <div class="col-12 col-sm-1">
                                                        <div class="avatar">
                                                            <img src="{{asset('web_ar/img/default-avatar.jpg')}}" alt=""
                                                                 class="avatar-image">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-11">
                                                        <div class="font-light me-2"><i
                                                                class="fas fa-fw fa-user"></i> {{\App\Models\User::where('id',$comment->user_id)->first()->name;}}
                                                        </div>
                                                        <div class="font-light me-2"><i class="far fa-fw fa-clock"></i>
                                                            <span
                                                                class="font-xs">{{time_elapsed_string($comment->created_at)}}</span>
                                                        </div>
                                                        <div class="mt-3">{{$comment->comment}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(!is_null($comment->replay))
                                                <div class="comment-reply mt-4">
                                                    <div class="comment-user row">
                                                        <div class="col-12 col-sm-1 ">
                                                            <div class="avatar">
                                                                <img src="{{asset('web_ar/img/default-avatar.jpg')}}"
                                                                     alt="" class="avatar-image">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-11">
                                                            <div class="font-light me-2"><i
                                                                    class="fas fa-fw fa-user"></i>{{\App\Models\User::where('id',$comment->replay->user_id)->first()->name;}}
                                                            </div>
                                                            <div class="font-light me-2"><i
                                                                    class="far fa-fw fa-clock"></i> <span
                                                                    class="font-xs">{{time_elapsed_string($comment->replay->created_at)}}</span>
                                                            </div>
                                                            <div class="mt-3">{{$comment->replay->comment}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-none d-lg-block col-3"></div>


        <div class="col-12 col-lg-9 mt-4">
            <div class="custom-card">
                <div class="custom-card-body">
                    <div class="row">
                        <div class="col-12 text-primary font-xl mb-3">{{$labels['keywords']}}</div>
                        <div class="col-12">
                            @foreach($service_tags as $tag)
                                <span class="badge bg-secondary cursor-pointer">{{$tag->tag}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-lg-block col-3"></div>

        <div class="col-12 col-lg-9 mt-4 mb-5">
            <div class="custom-card">
                <div class="custom-card-body">
                    <div class="row">
                        <div class="col-12 text-primary font-xl">{{$labels['suggested_services']}}</div>
                        @foreach($similar_services as $similar)
                            <div class="col-12 col-sm-6 mt-3 ">
                                <!-- begin service-card -->
                                <div class="card service-card item ">
                                    <a href="{{route('store.service.details',$similar->id)}}">
                                        <div class="card-img-top"

                                        >
                                            <div id="carouselExampleControls" class="carousel slide"
                                                 data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach(\App\Models\Services\ServiceImages::where('service_id',$similar->id)->get() as $key => $slider)
                                                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                            <img src=" {{asset($slider->image)}}" class="d-block w-100"
                                                                 alt="...">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                    <br>
                                    <br>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <div class="avatar">
                                                {{--                                                <a href="profile-seller.html">--}}
                                                <a href="{{route('store.profile_seller',$similar->ServiceOwner->id)}}">
                                                    <img src="{{asset($similar->ServiceOwner->image)}}"
                                                         class="avatar-image"/>
                                                    <span class="avatar-title ms-2">
                 {{$similar->ServiceOwner->name}}
                    </span>
                                                </a>
                                            </div>
                                        </h5>
                                        <p class="card-text">
                                            {{$similar->title}}
                                        </p>
                                        <div class="service-card-action">

                                            {{--                                            <div class="service-card-favorite active">--}}
                                            {{--                                                <i class="fas fa-heart"></i>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <a href="{{route('store.service.details',$similar->id)}}"
                                       class="btn btn-primary service-card-btn"
                                    >{{$labels['service_details']}}</a
                                    >
                                </div>
                                <!-- end service-card -->
                            </div>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block col-3"></div>

        </div>
    </div>

    </main>
    <!-- end main -->

@endsection
