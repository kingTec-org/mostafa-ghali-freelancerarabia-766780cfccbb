@extends('dashboard.layouts.app')
@section('content')



    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
            @include('dashboard.layouts.includes.alerts.success')
            @include('dashboard.layouts.includes.alerts.errors')
            <!--begin::Card section 1-->
                <div class="row">

                    <div class="col-lg-12">
                        <!--begin::Card-->

                        <div class="card card-custom gutter-b example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">general info</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" action="{{route('admin.profile.update.general_info')}}"
                                  method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{auth('admin')->user()->id}}">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="">email</label>
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-solid"
                                                       name="email" value="{{auth('admin')->user()->email}}"  />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="">name</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-solid"
                                                       name="name" value="{{auth('admin')->user()->name}}"/>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="form-group">

                                        <div class="col-lg-6">
                                            <label for="">image : </label>
                                            <br>
                                            <div class="image-input image-input-outline " id="kt_image_2"
                                                 style="background-image: url('{{auth('admin')->user()->image}}'); ">
                                                <div class="image-input-wrapper"
                                                     style="background-image: url('{{auth('admin')->user()->image}}'); "></div>
                                                <label
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow "
                                                    data-action="change" data-toggle="tooltip" title=""
                                                    data-original-title="Update Image">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                    </svg>
                                                    <input type="file" name="image"
                                                           accept=".png, .jpg, .jpeg , .gif, .svg" />
                                                    <input type="hidden" name="profile_avatar_remove" />
                                                </label>
                                                <span
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow col-lg-6"
                                                    data-action="cancel" data-toggle="tooltip"
                                                    title="Delete Image">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                        </svg> 														</span>
                                                <span
                                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                    data-action="remove" data-toggle="tooltip"
                                                    title="Delete Image">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                        </svg>
                                        </span>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mr-2">update </button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <div class="card card-custom">
                            <div class="card-header">
                                <h3 class="card-title">password</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.profile.update.update_password')}}" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{auth('admin')->user()->id}}" name="id">
                                    <div class="form-body">
                                        <div id="passwords">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="projectinput1"> Old Password </label>
                                                        <input type="password" value="" id="password" class="form-control"
                                                               name="oldpassword">
                                                        @error("password")
                                                        {{--                                                                    <span class="text-danger">{{$message}}</span>--}}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="projectinput1">new pass</label>
                                                        <input type="password" value="" id="password" class="form-control"
                                                               name="password">
                                                        @error("password")
                                                        {{--                                                                    <span class="text-danger">{{$message}}</span>--}}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> confirm password </label>
                                                        <input type="password" id="password_confirm" class="form-control"
                                                               name="password_confirm">
                                                        @error("password_confirm")
                                                        {{--                                                                    <span class="text-danger">{{$message}}</span>--}}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row addCust-submitBtn-row-mg">
                                        <div class="col-md-12">
                                            <div class="form-actions mt-10" style="float: right;">

                                                <button type="submit" class="btn btn-primary mr-2">update </button>

                                                <a href="{{route('admin.index')}}" class="btn btn-secondary">back</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--end::Card-->
                        <!--end::Card-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->


            </div>
            <!--end::Content-->
        </div>
    </div>
@endsection


@section('script')
    <script>
        var avatar1 = new KTImageInput('kt_image_2');

        avatar1.on('cancel', function (imageInput) {
            swal.fire({
                title: 'Image successfully canceled !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Awesome!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });
    </script>

@endsection
