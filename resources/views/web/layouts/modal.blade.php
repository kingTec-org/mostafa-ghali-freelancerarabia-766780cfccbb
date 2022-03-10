<!-- begin signup-modal -->
<div
    class="modal modal-blur fade"
    id="SignupModal"
    tabindex="-1"
    aria-labelledby="SignupModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="SignupModalLabel">
                    {{$labels['create_accont']}}
                </h5>
            </div>
            <div class="modal-body">


                <form action="{{route('store.register')}}" method="POST" class="requires-validation" novalidate>
                    @if ($errors->any())
                        <div class="alert alert-danger" >
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('alert-fail-send-otp'))
                        <div class="alert alert-danger" role="alert">
                            {{session()->get('alert-fail-send-otp')}}
                        </div>
                    @endif
                    @csrf
                    <div class="col-md-12">
                        <input
                            class="form-control"
                            type="email"
                            name="user_email"
                            placeholder="{{$labels['email']}}"
                            required
                        />
                    </div>
                    <div class="col-md-12 mt-3">
                        <input
                            class="form-control"
                            type="text"
                            name="user_name"
                            placeholder=" {{$labels['username']}} "
                            required
                        />
                    </div>

                    <div class="col-md-12 mt-3">
                        <input
                            class="form-control"
                            type="password"
                            name="user_password"
                            placeholder="{{$labels['pass']}}"
                            required
                        />
                    </div>

                    <div class="col-12 text-white font-xl text-center mt-5 sideline">
                        <span>أو</span>
                    </div>

                    <div
                        class="col-12 d-flex justify-content-between mt-5 mx-auto w-50"
                    >
                        <a href="{{route('SocialAuth.redirect','google')}}"><img src="{{asset('web_ar/img/google.png')}}"  alt="" /></a>
                        {{--                        <a href="#"><img src="{{asset('web_ar/img/apple.png')}} " alt="" /></a>--}}
                        <a href="#"><img src="{{asset('web_ar/img/facebook.png')}} " alt="" /></a>
                    </div>

                    <!--
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                  <label class="form-check-label">I confirm that all data are correct</label>
                 <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                </div> -->

                    <div class="form-button mt-5">
                        <button
                            type="submit"
                            class="btn btn-primary w-100 btn-hover"
                            data-bs-dismiss="modal" data-bs-toggle="modal" href="#VerifyEmailModal"
                        >
                            {{$labels['create_accont']}}
                        </button>
                    </div>
                    <div class="col-12 mt-1 text-center text-white">
                        <span>{{$labels['joining_means_agreeing_to']}}</span>
                        <a href="{{route('store.terms_conditions')}}"> <b>{{$labels['terms_conditions']}}</b></a>
                    </div>
                    <div class="col-md-12 mt-5 text-white text-center">
                        <span>{{$labels['have_account']}}</span>
                        <!-- <span
                          class="cursor-pointer"
                          data-bs-toggle="modal"
                          data-target="#LoginModal"
                          ><b>تسجيل الدخول</b></span
                        > -->
                        <a  data-bs-toggle="modal"  data-bs-dismiss="modal" data-bs-target="#LoginModal" href="#"><b>{{$labels['login']}}</b></a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end signup-modal -->
<!-- begin login-modal -->
<div
    class="modal modal-blur fade"
    id="LoginModal"
    tabindex="-1"
    aria-labelledby="LoginModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="LoginModalLabel">{{$labels['login']}}</h5>
            </div>

            <div class="modal-body">
                @if(session()->has('alert-fails'))
                    <div class="alert alert-danger" role="alert">
                        {{session()->get('alert-fails')}}
                    </div>
                @endif
                <form class="requires-validation" novalidate method="POST" action="{{ route('store.login') }}">
                    @csrf
                    <div class="col-md-12">
                        <input
                            class="form-control"
                            type="email"
                            name="email"
                            placeholder="{{$labels['email']}}"
                            required
                        />
                    </div>

                    <div class="col-md-12 mt-3">
                        <input
                            class="form-control"
                            type="password"
                            name="password"
                            placeholder="{{$labels['pass']}}"
                            required
                        />
                    </div>

                    <div class="col-12 text-white font-xl text-center mt-5 sideline">
                        <span>{{$labels['or']}}</span>
                    </div>

                    <div
                        class="col-12 d-flex justify-content-between mt-5 mx-auto w-50"
                    >
                        <a href="{{route('SocialAuth.redirect','google')}}" target="_blank"><img src="{{asset('web_ar/img/google.png')}}"  alt="" /></a>
                        {{--                        <a href="{{route('SocialAuth.redirect','apple')}}"><img src="{{asset('web_ar/img/apple.png')}} " alt="" /></a>--}}
                        <a href="{{route('SocialAuth.redirect','facebook')}}" target="_blank"><img src="{{asset('web_ar/img/facebook.png')}} " alt="" /></a>
                    </div>

                    <div class="form-button mt-5">
                        <button

                            type="submit"
                            class="btn btn-primary w-100 btn-hover font-sm"
                        >
                            {{$labels['login']}}
                        </button>
                    </div>
                    <div class="col-12 d-flex justify-content-between mt-1">
                        <label class="form-check-label text-white"
                        ><input
                                class="form-check-input me-2"
                                type="checkbox"
                                value=""
                                id="rememberMe"
                            />{{$labels['remember']}}</label
                        >
                        <a class="cursor-pointer text-white" data-bs-dismiss="modal" data-bs-toggle="modal" href="#ForgotPasswordModal">
                            {{$labels['forgot_pass']}}
                        </a>
                    </div>
                    <div class="col-md-12 mt-5 text-white text-center">
                        <span>{{$labels['dont_have_account']}}</span>
                        <!-- <span class="cursor-pointer"><b>أنشئ حساب جديد</b></span> -->
                        <a data-bs-dismiss="modal" role="button" data-bs-toggle="modal" href="#SignupModal"><b>{{$labels['create_accont']}}</b></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end login-modal -->
<!-- begin login-modal -->
<div
    class="modal modal-blur fade"
    id="ContactUsModal"
    tabindex="-1"
    aria-labelledby="ContactUsLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="ContactUsLabel">{{$labels['contact_us']}}</h5>
            </div>

            <div class="modal-body">

                <div class="requires-validation">

                    <div class="col-md-12">
                        <label class="form-check-label text-white">
                            {{$labels['company_name']}}
                        </label>

                        <input class="form-control" placeholder="Free Lance Arabia Portal"
                               disabled value="Free Lance Arabia Portal"
                        />
                    </div>

                    <div class="col-md-12">
                        <label class="form-check-label text-white">
                            {{$labels['complete_address']}}
                        </label>

                        <textarea class="form-control" rows="3"
                                  disabled
                        />
                        Level 1, Al Bateen Tower C6 Bainunah , ADIB Building, Street 34 ,Abu Dhabi, United Arab Emirates
                        </textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-check-label text-white">
                            {{$labels['country']}}
                        </label>

                        <input class="form-control" placeholder="United Arab Emirates"
                               disabled value="United Arab Emirates"
                        />
                    </div>

                    <div class="col-md-12">
                        <label class="form-check-label text-white">
                            {{$labels['contact_nu']}}
                        </label>

                        <input class="form-control" placeholder=" +972521343040"
                               disabled value=" +972521343040"
                        />
                    </div>

                    <div class="col-md-12">
                        <label class="form-check-label text-white">
                            {{$labels['email']}}
                        </label>

                        <input class="form-control" placeholder=" info@freelancearabiauae.com"
                               disabled value=" info@freelancearabiauae.com"
                        />
                    </div>

                    <br>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- end login-modal -->
<!-- begin login-modal -->

<!-- end login-modal -->
<!-- begin verify-email-modal -->
<div
    class="modal modal-blur fade"
    id="VerifyEmailModal"
    tabindex="-1"
    aria-labelledby="VerifyEmailModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="VerifyEmailModalLabel">تفعيل الايميل</h5>
            </div>
            <div class="modal-body">
                <div class="text-center text-white">
                    تم ارسال رمز التأكيد إليك من فضلك تحقق من الرسالة
                    أعد كتابة الكود
                </div>
                <form class="requires-validation" novalidate method="post" action="{{route('store.email_verification')}}">
                    @if ($errors->any())
                        <div class="alert alert-danger" >
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('alert-fails'))
                        <div class="alert alert-danger" role="alert">
                            {{session()->get('alert-verify-email')}}
                        </div>
                    @endif
                    @csrf
                    <div class="col-md-12 mt-5">
                        <div class="text-center partitioned-input-outer">
                            <div class="text-cente partitioned-input-inner form form-group">
                                {{--                                <input type="email" name="verification_email" class="form-control" id="verification_email" value="{{old('verification_email')}}" >--}}
                                <br>
                                <input type="text" maxlength="4"  name="verification_otp" class="partitioned-input"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-button mt-5">
                        <button
                            {{--                            href="landing-buyer.html"--}}
                            type="submit"
                            class="btn btn-primary w-100 btn-hover font-sm"
                        >
                            تسجيل الدخول
                        </button>
                    </div>

                    {{--                    <div class="col-md-12 mt-5 text-white text-center">--}}
                    {{--                        <span>لم يصلني كود التفعيل؟</span>--}}
                    {{--                        <!-- <span class="cursor-pointer"><b>أنشئ حساب جديد</b></span> -->--}}
                    {{--                        <a href="#"><b>اعد ارسال الكود</b></a>--}}
                    {{--                    </div>--}}
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end verify-email-modal -->
<!-- begin forgot-password-modal -->
<div
    class="modal modal-blur fade"
    id="ForgotPasswordModal"
    tabindex="-1"
    aria-labelledby="ForgotPasswordModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="ForgotPasswordModalLabel">نسيت كلمة المرور</h5>
            </div>
            <div class="modal-body">
                <div class="text-center text-white">
                    الرجاء إدخال عنوان بريدك الإلكتروني وسنرسل لك رابطاً لإعادة تعيين كلمة المرور الخاصة بك
                </div>
                <form class="requires-validation" novalidate>
                    <div class="col-md-12 mt-5">
                        <input
                            class="form-control"
                            type="text"
                            name="email"
                            type="email"
                            placeholder="{{$labels['email']}}"
                            required
                        />
                    </div>

                    <div class="form-button mt-5">
                        <button
                            type="button"
                            class="btn btn-primary w-100 btn-hover"
                            data-bs-dismiss="modal" data-bs-toggle="modal" href="#ForgotPasswordCodeModal"
                        >
                            ارسال
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end forgot-password-modal -->
<!-- begin forgot-password-code-modal -->
<div
    class="modal modal-blur fade"
    id="ForgotPasswordCodeModal"
    tabindex="-1"
    aria-labelledby="ForgotPasswordCodeModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="ForgotPasswordCodeModalLabel">نسيت كلمة المرور</h5>
            </div>
            <div class="modal-body">
                <div class="text-center text-white">
                    تم ارسال رمز التأكيد إليك من فضلك تحقق من الرسالة
                    أعد كتابة الكود
                </div>
                <form class="requires-validation " novalidate>
                    <div class="col-md-12 mt-5 text-center">
                        <div class="text-center partitioned-input-outer">
                            <div class="text-cente partitioned-input-inner">
                                <input type="text" maxlength="4" class="partitioned-input"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-button mt-5">
                        <button
                            type="button"
                            class="btn btn-primary w-100 btn-hover"
                            data-bs-dismiss="modal" data-bs-toggle="modal" href="#ForgotPasswordRecoverModal"

                        >
                            استعادة كلمة المرور
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end forgot-password-code-modal -->
<!-- begin forgot-password-recover-modal -->
<div
    class="modal modal-blur fade"
    id="ForgotPasswordRecoverModal"
    tabindex="-1"
    aria-labelledby="ForgotPasswordRecoverModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="ForgotPasswordRecoverModalLabel">نسيت كلمة المرور</h5>
            </div>
            <div class="modal-body">
                <div class="text-center text-white">
                    الرجاء إدخال عنوان بريدك الإلكتروني وسنرسل لك رابطاً لإعادة تعيين كلمة المرور الخاصة بك
                </div>
                <form class="requires-validation" novalidate>
                    <div class="col-md-12 mt-3">
                        <input
                            class="form-control"
                            type="password"
                            name="password"
                            placeholder="كلمة المرور الجديدة"
                            required
                        />
                    </div>
                    <div class="col-md-12 mt-3">
                        <input
                            class="form-control"
                            type="password"
                            name="password"
                            placeholder="تأكيد كلمة المرور الجديدة"
                            required
                        />
                    </div>

                    <div class="form-button mt-5">
                        <button

                            data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#LoginModal"
                            class="btn btn-primary w-100 btn-hover"
                        >
                            استعادة كلمة المرور
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div
    class="modal modal-blur fade"
    id="video_model"
    tabindex="-1"
    aria-labelledby="video_modelLabel"
    aria-hidden="true"
>
    <div class="modal-dialog ">
        <div class="modal-content p-0 m-0">
            {{--                <div class="modal-header text-center">--}}
            {{--                    <h5 class="modal-title w-100" id="ForgotPasswordRecoverModalLabel">نسيت كلمة المرور</h5>--}}
            {{--                </div>--}}
            <div class="modal-body p-0 m-0">
                <video  src="{{asset('media/Freelance_Arabia_Platform.mp4')}}" controls class="mt-3" width="100%" height="100%"    ></video>

            </div>
        </div>
    </div>
</div>
@yield('modals')
@stack('modals_s')
