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
                        <a href="{{route('store.order.purchasesComplete')}}"> تم التسليم</a>
                    </div>
                    <div class="col-3 text-end text-lg-start">
                        <div class="badge bg-outline-primary">{{$itemPurchasesCompleteCount->count()}}</div>
                    </div>
                </div>
                <!-- end filter -->
                <!-- begin filter -->
                <div class="row mt-2">
                    <div class="col-9">
                        <a href="{{route('store.order.purchasesCanceled')}}">ملغي</a>
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
                            @foreach($itemPurchasesComplete as $item)
                                <!-- begin purchase -->
                                    <div class="row bottom-border px-3 py-3">
{{--                                        @foreach($item->items as $items)--}}
                                            <div class="d-none d-sm-block col-2 col-sm-1 p-0">
                                                <div class="avatar">
                                                    <img src="{{asset('web_ar/img/default-avatar.jpg')}}"
                                                         class="avatar-image"/>
                                                </div>
                                            </div>
                                        <div class="col-12 col-sm-11">
                                            <div class="card-header" style="text-align:{{getLang() =='ar'? 'left' :'right'}} ;background-color: white" >
                                                <a class="btn btn-primary" href="{{route('order_item.show_purchases_item',$item->id)}}" >عرض الطلب</a>

{{--                                                @if($item->waiting_acceptance == 1 && $item->in_progress == 0&& $item->is_complete == 0 && $item->is_canceled == 0 )--}}

{{--                                                    <span class="btn btn-secondary">--}}
{{--                                                             انتظار--}}
{{--                                                     </span>--}}
{{--                                                @elseif($item->waiting_acceptance == 0 && $item->in_progress == 1&& $item->is_complete == 0 && $item->is_canceled == 0 )--}}

{{--                                                    <span class="btn btn-warning">--}}
{{--                                                             قيد التنفيذ--}}
{{--                                                     </span>--}}
{{--                                                @elseif($item->waiting_acceptance == 0 && $item->in_progress == 0&& $item->is_complete == 1 && $item->is_canceled == 0)--}}
                                                    <span class="btn btn-primary">
                                                            تم تسليم الخدمة
                                                     </span>

{{--                                                @elseif($item->waiting_acceptance == 0 && $item->in_progress == 0&& $item->is_complete == 0 && $item->is_canceled == 1)--}}
{{--                                                    <span class="btn btn-danger">--}}
{{--                                                            تم الغاء الخدمة--}}
{{--                                                     </span>--}}
{{--                                                @endif--}}
                                            </div>
                                            <div class="card-body" style="background-color: white">
                                                <div class="font-lg text-primary">
                                                    {{$item->service->title}}
                                                </div>
                                                <span class="font-light me-2 d-block d-sm-inline">
                                                {{$item->service->ServiceOwner->name}}<i class="fas fa-fw fa-user"></i>
                                             <span class="font-xs"></span>
                                            </span>
                                            </div>


                                        </div>
                                    </div>
                                    <!-- end purchase -->
{{--                                @endforeach--}}
{{--                                    <div  class="card-footer">--}}

{{--                                        @if($item->waiting_acceptance == 1 && $item->is_canceled == 0&& $item->is_complete == 0)--}}
{{--                                            <span class="btn btn-warning">--}}
{{--                                                    قيد الانتظار--}}
{{--                                                </span>--}}
{{--                                        @elseif($item->waiting_acceptance == 0 && $item->is_canceled == 0&& $item->is_complete == 1)--}}
{{--                                            <span class="btn btn-primary">--}}
{{--                                                     تم القبول--}}
{{--                                                </span>--}}
{{--                                        @else--}}
{{--                                            <span class="btn btn-danger">--}}
{{--                                                     تم الرفض--}}
{{--                                                </span>--}}

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
