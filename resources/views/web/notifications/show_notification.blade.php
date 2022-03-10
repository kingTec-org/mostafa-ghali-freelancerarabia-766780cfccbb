@extends('web.layouts.master')

@section('content')
    <!-- begin main -->
    <main class="container-fluid">
        <div class="site-padding">
            <div class="row  mb-5">
                <div class="col-12 mt-5 ">
                    <a href="{{route('order_item.show_order_item',$item_id)}}"><h1 class="font-xl" > عرض الطلب </h1></a>
                </div>
                <div class="col-12 mt-3 mb-3 ">
                    <div class="custom-card">
                        <div class="custom-card-body">

                                        <div class="col-12 cart-item bottom-border py-4">
                                            <div class="cart-item-header d-flex justify-content-between">
                                                <h2 class="font-md">
                                                    {{$item->service->title}}
                                                </h2>
                                                <span>
                                                    @if(in_array($item->service->id ,$fav_services ))
                                <i class="fas fa-heart text-danger"></i>
                                                        @endif
                            </span>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="col-6 col-md-2 ">المبلغ</div>
                                                <div class=" col-6 text-end text-md-start"><span
                                                        class="num-border"> ${{$item->service->price}}</span>
                                                </div>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="col-6 col-md-2 ">عدد مرات الشراء</div>
                                                <div class=" col-6 text-end text-md-start"><span
                                                        class="num-border">{{$item->quantity}}</span>
                                                </div>
                                            </div>
                                            @if($order_item_add_service->count() >0)
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6 col-md-2 ">خدمات اضافية</div>
                                                    <div class=" col-12 col-sm-6 text-end text-md-start">
                                                        @foreach($order_item_add_service as $add_service)
                                                            <ul class="check-list d-flex">
                                                                <li>Title : {{$add_service->title}}</li>
                                                                <li>price: {{$add_service->price}} $</li>
                                                            </ul>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            @endif
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-6 col-md-2 ">بعض المعلومات</div>
                                                <div class=" col-12 col-sm-6 text-end text-md-start">

                                                   <textarea class="form-control col-lg-12" disabled style="background-color: white">{{$item->notes}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 py-4 bottom-border">
                                                <div class="row">
                                                    <div class="col-6 col-md-2 font-md text-primary">المبلغ الكلي</div>
                                                    <div class="text-primary col-6 text-end text-md-start"><span
                                                            class=" num-border num-border-primary p-1 font-md ">{{$item->quantity * $item->service->price }} $</span>
                                                    </div>

                                                </div>
                                            </div>
                                            @if($item->attachment)
                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-2 ">بعض المرفقات</div>
                                                <div class=" col-12">
                                                    @if($extension =='pdf')
                                                        <embed src="{{$item->attachment}}" width="500px" height="500px" />
                                                    @else
                                                        <img src="{{$item->attachment}}" width="170" height="215px"   >
                                                    @endif

                                                </div>
                                            </div>
                                            @endif
{{--                                            @if(count($deliver_items) == 0)--}}
{{--                                             <div  class="card-footer">--}}
{{--                                                @if($item->waiting_acceptance == 1 && $item->is_complete == 0 && $item->is_canceled == 0 )--}}

{{--                                                     <a href="{{route('order_item.finish_order_item',$item->id)}}">--}}
{{--                                                         <button type="button" class="btn btn-primary"> قبول وانهاء</button>--}}
{{--                                                     </a>--}}

{{--                                                     <button--}}
{{--                                                         data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#ServiceReviewModal"--}}
{{--                                                         class="btn btn-primary w-100 btn-hover">--}}
{{--                                                         مراجعة التسليم--}}
{{--                                                     </button>--}}



{{--                                                 @endif--}}
{{--                                             </div>--}}
{{--                                            @endif--}}
                                        </div>
                                </div>
                        </div>
                    </div>

                </div>
            </div>
        @foreach($deliver_items as $deliver_item)
        <div class="site-padding">
            <div class="row  mb-5">
                <div class="col-12 mt-5 ">
                    <h1 class="font-xl"> {{$deliver_item->type === 'deliver'? 'عرض التسليم':'مراجعة'}}</h1>
                </div>
                <div class="col-12 mt-3 mb-3 ">
                    <div class="custom-card">
                        <div class="custom-card-body">

                                        <div class="col-12 cart-item bottom-border py-4">
                                            <div class="cart-item-header d-flex justify-content-between">
                                                <h2 class="font-md">
                                                    {{$deliver_item->item->service->title}}
                                                </h2>
                                                <span>
                                                    @if(in_array($item->service->id ,$fav_services ))
                                <i class="fas fa-heart text-danger"></i>
                                                        @endif
                            </span>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="col-6 col-md-2 ">المبلغ</div>
                                                <div class="col-6 text-end text-md-start"><span
                                                        class="">${{$deliver_item->item->price}}</span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-6 col-md-2 ">بعض المعلومات</div>
                                                <div class=" col-12 col-sm-6 text-end text-md-start">

                                                   <textarea class="form-control col-lg-12" disabled style="background-color: white">{{$deliver_item->desc}}</textarea>
                                                </div>
                                            </div>
                                            @if($deliver_item->attachment)
                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-2 ">بعض المرفقات</div>
                                                <div class=" col-12">
                                                    @if($deliver_item =='pdf')
                                                        <embed src="{{asset('uploads/delivery_attachment/'.$deliver_item->attachment) }}" width="500px" height="500px" />
                                                    @else
                                                        <img src="{{asset('uploads/delivery_attachment/'.$deliver_item->attachment)}}" width="170" height="215px"   >
                                                    @endif

                                                </div>
                                            </div>
                                            @endif
                                            @if($deliver_item->type === 'finished')
                                                <div class="card-footer">
                                                    <a >
                                                        <span class="btn btn-primary">تم التسليم</span>
                                                    </a>
                                                </div>
                                            @else
                                            @if($deliver_item->id == $max_item && $deliver_item->type === 'deliver')
                                             <div class="card-footer">

{{--                                                     <a href="{{route('order_item.finish_order_item',$item->id)}}">--}}
{{--                                                         <button type="button" class="btn btn-primary"> قبول وانهاء</button>--}}
{{--                                                     </a>--}}
                                                 <button
                                                     data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#RatingServiceOwner"
                                                     class="btn btn-primary btn-hover">
                                                     قبول وانهاء
                                                 </button>
                                                     <button
                                                         data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#ServiceReviewModal"
                                                         class="btn btn-primary btn-hover">
                                                         مراجعة التسليم
                                                     </button>

                                             </div>
                                            @else
                                                <div class="card-footer">
                                                    <a >
                                                        <span class="btn btn-warning"> قيد التنفيد</span>
                                                    </a>
                                                </div>

                                            @endif

                                            @endif
                                        </div>
                                </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </main>
    <!-- end main -->

@endsection
@section('modals')
    <div
        class="modal modal-blur fade"
        id="ServiceReviewModal"
        tabindex="-1"
        aria-labelledby="ServiceReview"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="ServiceReview">ServiceDeliveryModal</h5>
                </div>

                <div class="modal-body">
                    @if(session()->has('alert-fails'))
                        <div class="alert alert-danger" role="alert">
                            {{session()->get('alert-fails')}}
                        </div>
                    @endif
                    <form class="requires-validation" novalidate method="POST" action="{{ route('order_item.review_order_item',$item->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="color: white">title</label>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="review_title"
                                >
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="color: white">desc</label>
                            </div>
                            <div class="col-lg-12">
                                <textarea class="form-control" name="review_desc"
                                ></textarea>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="color: white">Attachment</label>
                            </div>
                            <div class="col-lg-12">
                                <input
                                    class="form-control"
                                    type="file" name="review_attachment"
                                    accept="image/png,image/jpeg,image/jpg,application/pdf"
                                />
                            </div>
                        </div>
                        <div class="form-button mt-5">
                            <button
                                type="submit"
                                class="btn btn-primary w-100 btn-hover font-sm"
                            >
                                deliver
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div> <div
        class="modal modal-blur fade"
        id="RatingServiceOwner"
        tabindex="-1"
        aria-labelledby="ServiceRating"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="ServiceRating">RatingServiceOwner</h5>
                </div>
                <div class="modal-body">
                    @if(session()->has('alert-fails'))
                        <div class="alert alert-danger" role="alert">
                            {{session()->get('alert-fails')}}
                        </div>
                    @endif
                    <form class="requires-validation" novalidate method="POST" action="{{ route('order_item.finish_order_item',$item->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="color: white">Comment</label>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="comment">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="color: white">Rate</label>
                            </div>
                            <div class="col-lg-12">
                                <input class="star star-5" id="star-5" type="radio" value="5" name="rate"/>
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" id="star-4" type="radio" value="4" name="rate"/>
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" type="radio" value="3" name="rate"/>
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" id="star-2" type="radio" value="2" name="rate"/>
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" id="star-1" type="radio" value="1" name="rate"/>
                                <label class="star star-1" for="star-1"></label>
                            </div>

                        </div>

                        <div class="form-button mt-5">
                            <button
                                type="submit"
                                class="btn btn-primary w-100 btn-hover font-sm"
                            >
                                deliver
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
