<!-- end forgot-password-recover-modal -->
<script src="{{asset('web_en/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('web_en/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('web_en/vendor/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('web_en/js/main.js')}}"></script>
<script src="{{asset('web_ar/js/d0dbf24603.js')}}"></script>
<script src="{{asset('web_ar/js/tagify/jQuery.tagify.min.js')}}"></script>
<script src="{{asset('web_ar/js/notify/notify.js')}}"></script>
<script src="{{asset('web_ar/js/notify/notify.min.js')}}"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="{{asset('web_ar/js/fcm/fcm.js?v=').time()}}')}}"></script>
<script src="{{asset('web_ar/js/fcm/firebase_ini.js?v=').time()}}')}}"></script>
{{--<script src="{{asset('web_ar/js/fcm/firebase-messaging-sw.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@yield('scripts')

<!-- end forgot-password-recover-modal -->
<script src="{{asset('web_en/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('web_en/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('web_en/vendor/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('web_en/js/main.js')}}"></script>
<script src="{{asset('web_ar/js/d0dbf24603.js')}}"></script>
<script src="{{asset('web_ar/js/tagify/jQuery.tagify.min.js')}}"></script>
<script src="{{asset('web_ar/js/notify/notify.js')}}"></script>
<script src="{{asset('web_ar/js/notify/notify.min.js')}}"></script>

<script src="{{asset('web_ar/js/fcm/fcm.js?v=').time()}}')}}"></script>
<script src="{{asset('web_ar/js/fcm/firebase_ini.js?v=').time()}}')}}"></script>
{{--<script src="{{asset('web_ar/js/fcm/firebase-messaging-sw.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

@yield('scripts')

<!-- end forgot-password-recover-modal -->
<script src="{{asset('web_en/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('web_en/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('web_en/vendor/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('web_en/js/main.js')}}"></script>
<script src="{{asset('web_ar/js/d0dbf24603.js')}}"></script>
<script src="{{asset('web_ar/js/tagify/jQuery.tagify.min.js')}}"></script>
<script src="{{asset('web_ar/js/notify/notify.js')}}"></script>
<script src="{{asset('web_ar/js/notify/notify.min.js')}}"></script>

<script src="{{asset('web_ar/js/fcm/fcm.js?v=').time()}}')}}"></script>
<script src="{{asset('web_ar/js/fcm/firebase_ini.js?v=').time()}}')}}"></script>
{{--<script src="{{asset('web_ar/js/fcm/firebase-messaging-sw.js')}}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

@yield('scripts')

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {

        loop: true,
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
                slidesPerGroup: 1,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 10,
                slidesPerGroup: 1,
            },
            896: {
                slidesPerView: 2,
                spaceBetween: 10,
                slidesPerGroup: 2,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 20,
                slidesPerGroup: 1,
            },
        },
        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

    });
    var swiper2 = new Swiper(".header_swiper_slider", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },

        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".header_swiper_slider-pagination",
            clickable: true,

        },
        /*  navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
          },*/

    });
</script>
<script type="text/javascript">
    $(window).scroll(function() {
        //After scrolling 100px from the top...
        if ( $(window).scrollTop() >= 100 ) {

            $(".navbar .white").css('display', 'none');
            $(".navbar .blue").css('display', 'block');
            $(".navbar .nav-menu-start .nav-item .nav-link").css('color', '#194275');
            $(".navbar").css('background-color', '#fff');
            $(".navdownlist").css('display', 'block');
            $(".nav_bg").removeClass('nan_bg');
            // $(".nav-item i").css('color', '#1875BC');
            $(".nav_button_section").removeClass('nav_button_main').addClass('nav_button_main2');
            $(".nav_button_section_not_border").removeClass('nav_button_section_not_border').addClass('nav_button_section_not_border_white');

            //Otherwise remove inline styles and thereby revert to original stying
        } else {
            $(".navbar .white").css('display', 'block');
            $(".navbar .blue").css('display', 'none');
            $(".navbar .nav-menu-start .nav-item .nav-link").css('color', '#fff');
            $(".navbar").css('background-color', '');
            $(".navdownlist").css('display', 'none');
            // $(".nav-item i").css('color', '#1875BC');

            // $(".nav-item i").css('color', '#fff');
            $(".nav_bg").addClass('nan_bg');
            $(".nav_button_section").addClass('nav_button_main').removeClass('nav_button_main2');
            $(".nav_button_section_not_border_white").addClass('nav_button_section_not_border').removeClass('nav_button_section_not_border_white');


        }
    });

</script>

@if(session()->has('alert-fails'))
    <script>
        $(function() {
            $('#LoginModal').modal(
                'show'
            );
        });
    </script>
@endif
@if(session()->has('alert-verification'))
    <script>
        $(function() {
            $('#VerifyEmailModal').modal(
                'show'
            );
        });
    </script>
@endif
@if($errors->has('email') || $errors->has('password'))
    <script>
        $(function() {
            $('#LoginModal').modal(
                'show'
            );
        });
    </script>
@endif
@if($errors->has('user_email') || $errors->has('user_password')|| $errors->has('user_name'))
    <script>
        $(function() {
            $('#SignupModal').modal(
                'show'
            );
        } )
    </script>
@endif

@if(session()->has('alert-fail-send-otp'))
    <script>
        $(function() {
            $('#SignupModal').modal(
                'show'
            );
        } )
    </script>
@endif

@if($errors->has('verification_otp') )
    <script>
        $(function() {
            $('#VerifyEmailModal').modal(
                'show'
            );
        } );
    </script>
@endif

@if(session()->has('alert-verify-email'))
    <script>
        $(function() {
            $('#VerifyEmailModal').modal(
                'show'
            );
        });
    </script>
@endif

<script>
    $.ajaxSetup({
        'headers':{
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });


    $(document).on('click','.video_play *',function (){
        $('#video_model').modal('show');
    });
    $(document).on('mouseenter ','.data-action-show-on-hover',function (){
        let target = $(this).data("actionShowOnHover");
        console.log('hover',target,$(this));
        console.log(target);

        $('.category-nav-items').hide();
        $("#"+target).show();
    });
    //.not('.data-action-show-on-hover, .category-nav-items ')
    $(document).on('mouseleave','.category-nav-items', function (){

        $('.category-nav-items').hide();

    })
</script>
