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
            <div class="row mb-5">
                <div class="col-12  mt-5">
                    <h1 class="font-xl">
                        {{$labels['settings']}}
                    </h1>
                </div>
                <div class="col=-12 col-md-3 col-lg-2  mt-3">
                    <ul class="side-nav">
                        <li class="side-nav-item">
                            <a class="side-nav-link active" href="{{route('store.settings.show')}}">
                                {{$labels['account']}}
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a class="side-nav-link " href="{{route('store.settings.settings_notifications')}}">
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
                    <div class="custom-card">
                        @if(session()->has('alert-success'))
                            <div class="alert alert-success" style="text-align: center">{{session()->get('alert-success')}}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger" >
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="custom-card-body">
                            <form action="{{route('store.settings.general_settings.update')}}" method="POST">

                                @csrf

                                <input type="hidden" name="is_active" value="0">
                                <div class="col-12 col-md-4 font-md">{{$labels['cancel_account']}}</div>
                                <div class="col-12 col-md-8">
                                    <ul class="bullet-list">
                                        <li>{{$labels['deactivate_account']}}</li>
                                    </ul>
                                </div>
                                <div class="col-12 col-md-4 font-md">{{$labels['delete_account_reasone']}}</div>

                                <div class="col-12 col-md-8">
                                    <select class="form-control" name="deactivation_reason">
                                        <option selected disabled>{{$labels['select_reason']}}</option>
                                        <option value="لدي حساب آخر على الموقع">{{$labels['i_have_another_account']}}</option>
                                        <option value="أريد تغيير اسم المستخدم">{{$labels['i_want_change_user_name']}}</option>
                                        <option value="لا أتلقى عروض جيدة">{{$labels['i_not_getting_good_offers']}}</option>
                                        <option value="الموقع صعب استخدامه">{{$labels['site_difficult_use']}}</option>
                                        <option value="سياسات الموقع لم تعجبني">{{$labels['site_policies_inconvenient']}}</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 mt-4 font-md">
                                    <div>
                                        {{$labels['your_feedback']}}
                                    </div>
                                </div>
                                <div class="col-12 col-md-8 mt-0 mt-md-4">
                                    <textarea class="form-control" name="deactivation_note" rows="3"></textarea>
                                </div>
                                <div class="col-12 text-end mt-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{$labels['disable_account']}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- end main -->

    @endsection
