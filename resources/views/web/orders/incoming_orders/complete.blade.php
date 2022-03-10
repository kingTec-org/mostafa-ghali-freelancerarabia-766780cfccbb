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
        <div class="row site-padding">
            <div class="col-12 mt-4 d-flex justify-content-between">
{{--                <h2>المشتريات</h2>--}}
{{--                <select class="form-control w-25">--}}
{{--                    <option>الاحدث</option>--}}
{{--                    <option>الاقدم</option>--}}
{{--                </select>--}}
            </div>
            <div class="col-12 col-lg-3 mt-3">
                <h3 class="font-xl">حالة الطلب</h3>
                <!-- begin filter -->
                <div class="row mt-2">
                    <div class="col-9">
                        {{--    <label><input class="form-check-input" type="checkbox" value=""/>تم التسليم</label>--}}
                        <a href="{{route('store.order.orderComplete')}}"> تم التسليم</a>
                    </div>
                    <div class="col-3 text-end text-lg-start">
                        <div class="badge bg-outline-primary">{{$itemPurchasesCompleteCount->count()}}</div>
                    </div>
                </div>
                <!-- end filter -->
                <!-- begin filter -->
                <div class="row mt-2">
                    <div class="col-9">
                        {{--                        <label><input class="form-check-input" type="checkbox" value=""/>ملغي</label>--}}
                        <a href="{{route('store.order.orderCanceled')}}">ملغي</a>
                    </div>
                    <div class="col-3 text-end text-lg-start">
                        <div class="badge bg-outline-primary">{{$itemPurchasesCanceled->count()}}</div>
                    </div>
                </div>
                <!-- end filter -->
            </div>
            <div class="col-12 col-lg-9 mt-3 mb-3">
                <div class="custom-card">
                    <div class="custom-card-body">
                        <div class="row">
                            <div class="col-12 p-0">
                            @foreach($itemPurchasesComplete as $service)
                                <!-- begin purchase -->
                                    <div class="row bottom-border px-3 py-3">
                                        <div class="d-none d-sm-block col-2 col-sm-1 p-0">
                                            <div class="avatar">
                                                <img src="{{asset('web_ar/img/default-avatar.jpg')}}" class="avatar-image" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-11">
                                            <div class="card-header" style="text-align:{{getLang() =='ar'? 'left' :'right'}} ;background-color: white" >
                                                <a class="btn btn-primary" href="{{route('order_item.show_order_item',$service->id)}}" >عرض الطلب</a>
                                            </div>
                                            <div class="card-body" style="background-color: white">
                                                <div class="font-lg text-primary">
                                                    {{$service->service->title}}
                                                </div>
                                                <span class="font-light me-2 d-block d-sm-inline">
                                                {{$service->order->user->name}}<i class="fas fa-fw fa-user"></i>
                                             <span class="font-xs"></span>
                                            </span>
                                            </div>


                                        </div>
                                    </div>
                                    <!-- end purchase -->

{{--                                    <div  class="card-footer">--}}
{{--                                        @if($service->waiting_acceptance == 1 && $service->is_complete == 0 && $service->is_canceled == 0 )--}}
{{--                                            <a href="{{route('order_item.complete',$service->id)}}">--}}
{{--                                                <button type="button" class="btn btn-primary">تسليم</button>--}}
{{--                                            </a>--}}
{{--                                            <a href="{{route('order_item.cancel',$service->id)}}">--}}
{{--                                                <button type="button" class="btn btn-danger">رفض</button>--}}
{{--                                            </a>--}}
{{--                                        @else--}}
{{--                                            @if($service->is_complete == 1)--}}
{{--                                                <span class="btn btn-primary">--}}
{{--                                                     تم التسليم--}}
{{--                                                </span>--}}
{{--                                            @else--}}
{{--                                                <span class="btn btn-danger">--}}
{{--                                                     تم الرفض--}}
{{--                                                </span>--}}
{{--                                            @endif--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center my-5">
                    {{$itemPurchasesComplete->links('web.home.custom_paginate')}}
                </div>
            </div>
        </div>
    </main>
    <!-- end main -->

@endsection
