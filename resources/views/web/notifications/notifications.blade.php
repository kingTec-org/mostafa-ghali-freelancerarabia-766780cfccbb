@extends('web.layouts.master')
@section('content')
    <!-- begin top-services -->
    <div class="top-services">
        <div class="owl-carousel top-services-carousel">
            <div class="item text-center">تصميم و أعمال فنية و إبداعية</div>
            <div class="item text-center">تسويق إلكتروني</div>
            <div class="item text-center">كتابة، تحرير، ترجمة</div>
            <div class="item text-center">
                برمجة، تطوير و بناء المواقع و التطبيقات
            </div>
            <div class="item text-center">أعمال و خدمات استشارية و إدارية</div>
            <div class="item text-center">موسيقى و صوت</div>
        </div>
    </div>
    <!-- end top-services -->
    <!-- begin main -->
    <main class="container-fluid">
        <div class="site-padding">
            <div class="row mb-5">
                <div class="col-12 mt-5">
                    <h1 class="font-xl">الاشعارات</h1>
                </div>
                <div class="col-12 mt-3 mb-3">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <div class="row">
                                <div class="col-12 ">
                                    @foreach($notifications as $notification)
                                    <!-- begin notification -->
                                        <a href="{{route('notification.markAsReadNotification',[json_decode($notification->data)->item_id,$notification->id])}}">
                                    <div class="row bottom-border px-2 py-3">
                                        <div class="d-none d-sm-block col-2 col-sm-1 p-0">
                                            <div class="avatar">
                                                <img src="{{\App\Models\User::where('id',json_decode($notification->data)->requester_user_id)->first()->image}}" class="avatar-image" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-11">
                                            <div class="notification-title text-primary">
                                               {{ json_decode($notification->data)->title .' '.json_decode($notification->data)->service_name }}
                                            </div>
                                            <span class="font-light me-2 d-block d-sm-inline"
                                            ><i class="fas fa-fw fa-user"></i>
                              <span class="font-xs">{{\App\Models\User::where('id',json_decode($notification->data)->requester_user_id)->first()->name}}</span></span
                                            >
                                            <span class="font-light me-2 d-block d-sm-inline"
                                            ><i class="far fa-fw fa-clock"></i>
                              <span class="font-xs">{{time_elapsed_string($notification->created_at)}}</span></span
                                            >
                                        </div>
                                    </div>
                                        </a>
                                    <!-- end notification -->
                                        @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center my-5">
              {{$notifications->links('web.home.custom_paginate')}}
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end main -->

@endsection
