
<footer class="footer">
    <div class="footer-wrapper row">
        <div class="col-12 col-md-4 footer-start">
            <img src="{{asset('web_ar/img/logo-white.png')}} " class="footer-logo" alt="" />
            <br>
            <br>
            <div class="social-links">
                <a href="https://twitter.com/FreelanceArabi1" rel="noopener noreferrer" target="_blank" class="social-link">
                    <i class="fab fa-twitter fa-2x"></i>
                </a>
                <a href="https://www.facebook.com/FreelanceArabia.ae" target="_blank" rel="noopener noreferrer" class="social-link">
                    <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a href="https://www.instagram.com/freelancearabia.ae/" target="_blank" rel="noopener noreferrer" class="social-link">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>

                <a href="https://www.linkedin.com/in/freelance-arabia-ba1353220/" target="_blank" rel="noopener noreferrer" class="social-link">
                    <i class="fab fa-linkedin fa-2x"></i>
                </a>
            </div>
            <div class="footer-payment">
                <img
                    src="{{asset('web_ar/img/visa.png')}}"
                    alt="visa"
                    width="50px"
                />
                <img src=" {{asset('web_ar/img/mastercard.png')}}" alt="paypal" width="50px" />
                <img src=" {{asset('web_ar/img/unionpay.png')}}" alt="paypal" width="50px" />
            </div>
        </div>
        <div class="col-12 col-md-8 footer-end">
            <div class="row">
                <!-- begin footer-list -->
                <div class="col-12 col-md-6 col-lg-4">
                    <ul class="footer-list">
                        <li class="footer-list-item footer-list-title">{{$labels['entrepreneur']}}</li>
                        <li class="footer-list-item">
                            <a href="{{route('store.common_questions')}}" class="footer-link"> {{$labels['common_questions_footer']}} </a>
                        </li>

                        <li class="footer-list-item">
                            <a

                                data-bs-target="#SignupModal"
                                data-bs-toggle="modal"
                            >
                                <i class="footer-link"></i>{{$labels['subscribe']}}
                            </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="mailto:info@freelancearabiauae.com" class="footer-link"> {{$labels['proposals']}} </a>
                        </li>
                    </ul>
                </div>
                <!-- end footer-list -->
                <!-- begin footer-list -->
                <div class="col-12 col-md-6 col-lg-4">
                    <ul class="footer-list">
                        <li class="footer-list-item footer-list-title">{{$labels['service_owner']}}</li>
                        <li class="footer-list-item">
                            <a href="{{route('store.common_questions')}}" class="footer-link"> {{$labels['common_questions_footer']}} </a>
                        </li>
                        <li class="footer-list-item">
                            <a

                                data-bs-target="#SignupModal"
                                data-bs-toggle="modal"
                            >
                                <i class="footer-link"></i>{{$labels['subscribe']}}
                            </a>
                        </li>
                        <li class="footer-list-item">
                            <a href="mailto:info@freelancearabiauae.com" class="footer-link"> {{$labels['proposals']}} </a>
                        </li>
                    </ul>
                </div>
                <!-- end footer-list -->
                <!-- begin footer-list -->
                <div class="col-12 col-md-6 col-lg-4">
                    <ul class="footer-list">
                        <li class="footer-list-item footer-list-title">
                            <a href="{{route('store.about_us')}}" class="footer-link"> {{$labels['about_us']}}</a>
                        </li>
                        <li class="footer-list-item">
                            <a href="{{route('store.privacy')}}" class="footer-link">{{$labels['privacy_policy']}} </a>
                        </li>
                        <li class="footer-list-item">
                            <a href="{{route('store.terms_conditions')}}" class="footer-link"> {{$labels['terms_conditions']}} </a>
                        </li>
                        <li class="footer-list-item">
                            <a

                                data-bs-target="#ContactUsModal"
                                data-bs-toggle="modal"
                            >
                                <i class="footer-link"></i>{{$labels['contact_us']}}
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- end footer-list -->
            </div>
        </div>
        <hr />
        <div class="col-12 text-end text-white" style="direction: ltr">
            &copy; 2021  @if(getLang() =='ar') فريلانس عربية @else Freelance Arabia.com @endif | {{$labels['rights_reserved']}}
        </div>
    </div>
</footer>
<!-- end footer -->
