@extends('web.layouts.master')
@section('content')
    <!-- begin main -->
    <main class="container-fluid">
        <br>
        <br>
        <div class="site-padding">
            <div class="row  mb-5">
                <div class="col-12 mt-5 ">
                    <h1 class="font-xl">shopping basket</h1>
                </div>
                <div class="col-12 mt-3 mb-3 ">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <form action="{{route('checkout.cart')}}" method="POST"
                            >
                                @csrf

                                <div class="col-lg-12">
                                    @foreach($carts as $cart)
                                        <div class="col-12 cart-item bottom-border py-4">
                                            <div class="cart-item-header d-flex justify-content-between">
                                                <h2 class="font-md">
                                                    {{$cart->service->title}}
                                                </h2>
                                                <span>
                                                    <a href="{{route('store.cart.delete_item',$cart->service->id)}}">
                                                        <i class="fa fa-trash text-danger" aria-hidden="true"></i>

                                                    </a>

                            </span>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="col-6 col-md-2 "><h5>المبلغ</h5></div>
                                                <div class=" col-6 text-end text-md-start"><span
                                                        class="num-border"> ${{$cart->service->price}}</span>
                                                </div>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="col-6 col-md-2 "><h5>عدد مرات الشراء</h5></div>
                                                <div class=" col-6 text-end text-md-start"><span
                                                        class="num-border">{{$cart->quantity}}</span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-6 col-md-2 ">خدمات اضافية</div>
                                                <div class=" col-12 col-sm-6 text-end text-md-start">

                                                    @if(\App\Models\Services\AdditionalServices::where('service_id',$cart->service->id)->count() >0)
                                                        @foreach(\App\Models\Services\AdditionalServices::where('service_id',$cart->service->id)->get() as $add_service)

                                                            <ul class="check-list d-flex">
                                                                <input type="checkbox" style="margin: 10px"
                                                                       name="additional_service[{{$cart->service->id}}][]"
                                                                       value="{{$add_service->id}}" checked>
                                                                <li>Title : {{$add_service->title}}</li>
                                                                <li>price: {{$add_service->price}} $</li>
                                                            </ul>
                                                        @endforeach

                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        @php
                                            $add_servoices  =\App\Models\Services\AdditionalServices::where('service_id',$cart->service->id)->get();
                                              $add_service = 0 ;
                                              foreach ($add_servoices as $add_servoice){
                                                  $add_service +=$add_servoice->price;
                                              }
                                        @endphp
                                    @endforeach
                                    <div class="col-12 pb-5">
                                        <h4 style="color:#5b84a3">Inquiries about website design and programming</h4>
                                    </div>
                                    <div class="col-12 py-3 ">
                                        <div class="row">
                                            <div class="col-6 col-md-2 font-md text-primary"><h5>price</h5></div>
                                            <div class="text-primary col-6 text-end text-md-start">
                                                <span
                                                    class=" num-border num-border-primary p-1 font-md ">{{$sub_total}}</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 py-3 ">
                                        <div class="row">
                                            <div class="col-6 col-md-2 font-md text-primary"><h5>Tax amount</h5></div>
                                            <div class="text-primary col-6 text-end text-md-start">
                                                <span
                                                    class=" num-border num-border-primary p-1 font-md ">{{\App\Models\Settings\SystemSettings::first()->stripe_tax .'%'}}</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 py-3 ">
                                        <div class="row">
                                            <div class="col-6 col-md-2 font-md text-primary"><h5>Tax</h5></div>
                                            <div class="text-primary col-6 text-end text-md-start">
                                                <span
                                                    class=" num-border num-border-primary p-1 font-md ">{{$tax}}</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 pb-3 pt-4 bottom-border">
                                        <div class="row">
                                            <div class="col-6 col-md-2 font-md text-primary"><h5>additional services</h5></div>
                                            <div class="text-primary px-5 col-6 text-end text-md-start">
                                                <p style="font-size: 18px"><img class="mx-2" src="{{asset('web_en/img/Icon feather-check-circle.png')}}" width="20px">  service one</p>
                                                <p style="font-size: 18px"><img class="mx-2" src="{{asset('web_en/img/Icon feather-check-circle.png')}}" width="20px">  service one</p>
                                                <p style="font-size: 18px"><img class="mx-2" src="{{asset('web_en/img/Icon feather-check-circle.png')}}" width="20px">  service one</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 py-5 bottom-border">
                                        <div class="row">
                                            <div class="col-6 col-md-2 font-md text-primary"><h5>Total</h5></div>
                                            <div class="text-primary col-6 text-end text-md-start">
                                                <span class=" num-border num-border-primary p-1 font-md ">{{$total .' $'}}</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 pt-4">

                                        <div id="paymentMethods">
                                            <div class="font-md text-primary">
                                            </div>
                                            <div class="mt-3">

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="">

                                    <button class="btn btn-primary px-4" type="submit">
                                        pay
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="subcat py-5">
            <div class="container-fluid">
                <h3 style="color:#5b84a3">Services you may like</h3>
                <div class="row">
                    <div class="my-2 col-md-3 col-sm-12">
                        <div class="card">
                          <div class="swiper mySwiper">
                              <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                  <a href="#">
                                    <img src="{{asset('web_en/img/banner1.png')}} " class="" alt=""/>
                                  </a>
                              </div>
                              </div>
                              <div class="swiper-button-next"></div>
                              <div class="swiper-button-prev"></div>
                              <div class="swiper-pagination"></div>
                          </div><!-- end swiper -->
                        <div class="down ">
                          <div class="avatarr px-2 py-2">
                              <img src="{{asset('web_ar/img/default-avatar.jpg')}}" class="avatar-image" />
                              <a href="#">user name</a>
                          </div>
                          <div class="desc px-2">
                              <a href="#">I will create UI UX design for mobile app, website or landing  </a>
                          </div>
                         <div class="d-flex justify-content-between px-2 pt-2">
                          <p class="str pt-2 px-2">
                              <span class="fa fa-star checked"></span>
                           <span class="">5.0</span>(35)
                          </p>
                          <ul class="p-0 d-flex">
                              <li class="pt-1"><a href="#"><i class="fas fa-heart"></i></a></li>
                          </ul>
                         </div>
                          <div class="bar">
                              <a href="#" class="btn w-100">service details</a>
                          </div>
                        </div>
                      </div><!-- end card -->
                    </div>
                    <div class="my-2 col-md-3 col-sm-12">
                      <div class="card">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                <a href="#">
                                  <img src="{{asset('web_en/img/banner1.png')}}" class="" alt=""/>
                                </a>
                            </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div><!-- end swiper -->
                      <div class="down ">
                        <div class="avatarr px-2 py-2">
                            <img src="{{asset('web_ar/img/default-avatar.jpg')}}" class="avatar-image" />
                            <a href="#">user name</a>
                        </div>
                        <div class="desc px-2">
                            <a href="#">I will create UI UX design for mobile app, website or landing pppppsdsdds  </a>
                        </div>
                       <div class="d-flex justify-content-between px-2 pt-2">
                        <p class="str pt-2 px-2">
                            <span class="fa fa-star checked"></span>
                         <span class="">5.0</span>(35)
                        </p>
                        <ul class="p-0 d-flex">
                            <li class="pt-1"><a href="#"><i class="fas fa-heart"></i></a></li>
                        </ul>
                       </div>
                        <div class="bar">
                            <a href="#" class="btn w-100">service details</a>
                        </div>
                      </div>
                    </div><!-- end card -->

                  </div>
                  <div class="my-2 col-md-3 col-sm-12">
                    <div class="card">
                      <div class="swiper mySwiper">
                          <div class="swiper-wrapper">
                            <div class="swiper-slide">
                              <a href="#">
                                <img src="{{asset('web_en/img/banner1.png')}} " class="" alt=""/>
                              </a>
                          </div>
                          </div>
                          <div class="swiper-button-next"></div>
                          <div class="swiper-button-prev"></div>
                          <div class="swiper-pagination"></div>
                      </div><!-- end swiper -->
                    <div class="down ">
                      <div class="avatarr px-2 py-2">
                          <img src="{{asset('web_ar/img/default-avatar.jpg')}}" class="avatar-image" />
                          <a href="#">user name</a>
                      </div>
                      <div class="desc px-2">
                          <a href="#">I will create UI UX design for mobile app, website or landing  </a>
                      </div>
                     <div class="d-flex justify-content-between px-2 pt-2">
                      <p class="str pt-2 px-2">
                          <span class="fa fa-star checked"></span>
                       <span class="">5.0</span>(35)
                      </p>
                      <ul class="p-0 d-flex">
                          <li class="pt-1"><a href="#"><i class="fas fa-heart"></i></a></li>
                      </ul>
                     </div>
                      <div class="bar">
                          <a href="#" class="btn w-100">service details</a>
                      </div>
                    </div>
                  </div><!-- end card -->
                </div>
                <div class="my-2 col-md-3 col-sm-12">
                  <div class="card">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <a href="#">
                              <img src="{{asset('web_en/img/banner1.png')}}" class="" alt=""/>
                            </a>
                        </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div><!-- end swiper -->
                  <div class="down ">
                    <div class="avatarr px-2 py-2">
                        <img src="{{asset('web_ar/img/default-avatar.jpg')}}" class="avatar-image" />
                        <a href="#">user name</a>
                    </div>
                    <div class="desc px-2">
                        <a href="#">I will create UI UX design for mobile app, website or landing pppppsdsdds  </a>
                    </div>
                   <div class="d-flex justify-content-between px-2 pt-2">
                    <p class="str pt-2 px-2">
                        <span class="fa fa-star checked"></span>
                     <span class="">5.0</span>(35)
                    </p>
                    <ul class="p-0 d-flex">
                        <li class="pt-1"><a href="#"><i class="fas fa-heart"></i></a></li>
                    </ul>
                   </div>
                    <div class="bar">
                        <a href="#" class="btn w-100">service details</a>
                    </div>
                  </div>
                </div><!-- end card -->

              </div>
                </div>
            </div>
        </div>
        <!-- end recommended-services -->

    </main>

@endsection
