@extends('web.layouts.master')
@section('style')<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection
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
        <div class="row mb-5">
            <div class="col-12  mt-5">
                <h1 class="font-xl">
                    {{$labels['settings']}}
                </h1>
            </div>
            <div class="col=-12 col-md-3 col-lg-2  mt-3">
                <ul class="side-nav">
                    <li class="side-nav-item">
                        <a class="side-nav-link " href="{{route('store.settings.show')}}">
                            {{$labels['account']}}
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a class="side-nav-link active" href="{{route('store.settings.settings_notifications')}}">
                            {{$labels['notifications']}}
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a class="side-nav-link " href="{{route('store.settings.payment')}}">
                            Payment
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-9 col-lg-10  mt-3">
                <div class="custom-card ">
                    @if(session()->has('alert-success'))
                        <div class="alert alert-success" style="text-align: center">{{session()->get('alert-success')}}</div>
                    @endif
                    <div class="custom-card-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="font-md">
                                    الاشعارات
                                </div>
{{--                                <div class="font-xs font-light">--}}
{{--                                    للحصول على الاشعارات مهمة بخصوص نشاطك الخاص بك. لا يمكن تعطيل بعض الإشعارات--}}
{{--                                </div>--}}
                            </div>
                    <form action="{{route('notification.stop_notifications')}}" method="post"  >
                        @csrf
                        <div class="col-12 col-md-8 mt-0 mt-md-4">
                            <input type="checkbox" @if(auth('web')->user()->messages_push_notifications == 1) checked @else @endif name="push_notifications" data-toggle="toggle" data-on="{{$labels['enable']}}" on="1" off="0"  data-off="{{$labels['not_enabled']}}" data-size="sm">
                        </div>
                        <div class="col-12 text-end mt-5">
                            <button class="btn btn-primary" type="submit">
                                حفظ التغييرات
                            </button>
                        </div>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- end main -->
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

@endsection
