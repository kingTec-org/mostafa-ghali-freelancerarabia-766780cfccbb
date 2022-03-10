@extends('dashboard.layouts.app')
@section('content')

    <!--begin::Card-->
    <div class="card card-custom">

        <div class="card-header py-3">
            <div class="card-title">
											<span class="card-icon">
												<span class="svg-icon svg-icon-md svg-icon-primary">
													<!--begin::Svg Icon | path:/metronic/theme/html/demo4/dist/assets/media/svg/icons/Shopping/Chart-bar1.svg-->
													<svg xmlns="http://www.w3.org/2000/svg"
                                                         width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"/>
															<rect fill="#000000" opacity="0.3" x="12" y="4" width="3"
                                                                  height="13" rx="1.5"/>
															<rect fill="#000000" opacity="0.3" x="7" y="9" width="3"
                                                                  height="8" rx="1.5"/>
															<path
                                                                d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                                fill="#000000" fill-rule="nonzero"/>
															<rect fill="#000000" opacity="0.3" x="17" y="11" width="3"
                                                                  height="6" rx="1.5"/>
														</g>
													</svg>
                                                    <!--end::Svg Icon-->
												</span>
											</span>

                <h3 class="card-label">Show Service
                    <span
                        class="badge rounded-pill @if($service->admin_accept == 0) bg-danger @else bg-primary @endif ">@if($service->admin_accept == 0)
                            Not Accepted By Admin @else Accepted By Admin @endif </span>

                </h3>

            </div>

        </div>
        <div class="card-body">


            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for=""> Service Owner : </label>
                            <input rows="3" class="form-control form-control-solid"
                                   value="{{$service->ServiceOwner->name}}"/>

                        </div>
                        <div class="col-lg-6">
                            <label for="">Category : </label>
                            <input rows="3" class="form-control form-control-solid" disabled
                                   value="{{$service->SubCategory->name_en}}"/>
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="">Title : </label>
                            <textarea rows="3" class="form-control form-control-solid"
                                      disabled>{{$service->title}}</textarea>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Description : </label>
                            <textarea rows="3"
                                      class="form-control form-control-solid"
                                      disabled>{{$service->description}}</textarea>
                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="">Deliver Time : </label>

                            <div class="input-group">

                                <input class="form-control form-control-solid" disabled
                                       value="{{$service->deliver_time}}">
                                <div class="input-group-append">
                                    <label class="btn btn-secondary">Days</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Price : </label>

                            <div class="input-group">

                                <input class="form-control form-control-solid" value="{{$service->price}}" disabled>
                                <div class="input-group-append">
                                    <label class="btn btn-secondary">$</label>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="">Number of times to buy : </label>

                            <div class="input-group">

                                <input class="form-control form-control-solid" disabled
                                       value="{{$times_of_buy}}">
                                <div class="input-group-append">
                                    <label class="btn btn-secondary">Times</label>
                                </div>
                            </div>
                        </div>


                    </div>
                    @if($additional_services->count() > 0)
                        <label for="">Additional services : </label>
                    @endif
                    @if($additional_services->count() > 0)
                        <div class="row">
                            @foreach($additional_services as $add_service)
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Additional services </h5>
                                            <p class="card-text">{{$add_service->title}} .</p>
                                            <p>deliver Same time : <span>@if($add_service->deliver_at_same_time == 1)
                                                        yes @else No @endif</span></p>
                                            <p>Additional Days : <span>{{ $add_service->deliver_at_same_time == 1?$add_service->additional_days:0 }} Days </span>
                                            </p>
                                            <p>Price : <span>{{ $add_service->price }} $ </span></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <br>
                    @if($service_questions->count() >0)

                        <label for="">Service Question : </label>
                    @endif
                    @if($service_questions->count() >0)
                        <div class="form-group row">
                            @foreach($service_questions as $q)
                                <div class="card w-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$q->question}}</h5>
                                        <p class="card-text">{{$q->answer}}.</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if($service_tags->count() >0)

                        <label for="">Service Tags : </label>
                    @endif
                    @if($service_tags->count() >0)
                        <div class="form-control">
                            @foreach($service_tags as $tag)
                                <span class="">{{$tag->tag .' '.','}} </span>
                            @endforeach
                        </div>
                    @endif
                    <br>


                    <div class="form-group row">
                        <div class="card-group">
                            <div class="col-lg-12">
                                <label>images :</label>
                                <br>
                                @foreach($service_images as $image)
                                    <div class="image-input image-input-outline "
                                         style="background-image: url('{{$image->image}}');background-color: black ">
                                        <div class="image-input-wrapper"
                                             style="width: 121px;height: 150px;background-image:  url('{{$image->image}}'); background-color: black"></div>

                                    </div>

                                @endforeach

                            </div>
                        </div>


                    </div>


                    <div class="card-footer">
                        <a href="{{route('admin.services.index')}}"
                           class="btn btn-secondary font-weight-bold">back </a>

                    </div>
                </div>


            </div>

        </div>
    </div>
    <!--end::Card-->

@endsection
