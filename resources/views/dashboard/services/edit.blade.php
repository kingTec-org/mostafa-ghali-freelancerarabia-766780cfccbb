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

                <h3 class="card-label">Edit Service
                    <span
                        class="badge rounded-pill @if($service->admin_accept == 0) bg-danger @else bg-primary @endif ">@if($service->admin_accept == 0)
                            Not Accepted By Admin @else Accepted By Admin @endif </span>

                </h3>

            </div>

        </div>
        <div class="card-body">
            @include('dashboard.layouts.includes.alerts.success')
            @include('dashboard.layouts.includes.alerts.errors')

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for=""> Service Owner : </label>
                                <select name="user_id" class="form-control form-control-solid">
                                   <option>Select Customer </option>
                                    @foreach($customers as $customer)
                                    <option value="{{$customer->id}}"{{$service->ServiceOwner->id ==$customer->id?'selected':''}}>{{$customer->name}}</option>
                                    @endforeach

                                </select>
                        </div>
                         <div class="col-lg-6">
                            <label for=""> Admin Accept : </label>
                                <select name="admin_accept" class="form-control form-control-solid">
                                   <option>Select Customer </option>
                                    <option value="1" {{$service->admin_accept ==1?'selected':''}}>Accepted</option>
                                    <option value="0" {{$service->admin_accept ==0?'selected':''}}>Not Accept</option>

                                </select>
                        </div>



                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for=""> Category : </label>

                            <select class="form-control form-control-solid" name="edit_admin_service_category_id" id="edit_admin_service_category_id">
                                <option selected disabled>Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name_en}}</option>
                                @endforeach
                            </select>
                            </select>
                            @error('edit_admin_service_category_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Sub Category</label>
                            <select class="form-control form-control-solid @error('edit_admin_service_category_id') is-invalid  @enderror" name="edit_admin_service_sub_category_id"
                                    id="edit_service_category_id">
                                @include('dashboard.services.editsubCategoryService')
                            </select>
                            @error('edit_admin_service_category_id')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="">Title : </label>
                            <textarea name="title" rows="3" class="form-control form-control-solid"
                                      >{{$service->title}}</textarea>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Description : </label>
                            <textarea name="description" rows="3"
                                      class="form-control form-control-solid"
                                      >{{$service->description}}</textarea>
                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="">Deliver Time : </label>

                            <div class="input-group">

                                <input type="number" name="deliver_time" class="form-control form-control-solid"
                                       value="{{$service->deliver_time}}">
                                <div class="input-group-append">
                                    <label class="btn btn-secondary">Days</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Price : </label>

                            <div class="input-group">

                                <input type="number" name="price" class="form-control form-control-solid" value="{{$service->price}}" >
                                <div class="input-group-append">
                                    <label class="btn btn-secondary">$</label>
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
                                            <p>deliver Same time : <span>@if($add_service->deliver_at_same_time == 1)yes @else No @endif</span></p>
                                            <p>Additional Days : <span>{{ $add_service->deliver_at_same_time == 0 ?$add_service->additional_days:0 }} Days </span>
                                            </p>
                                            <p>Price : <span>{{ $add_service->price }} $ </span></p>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{route('admin.services.edit.additional_service',$add_service->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('admin.services.delete.additional_service',$add_service->id)}}" class="btn btn-danger">delete</a>
                                        </div>


                                    </div>
                                </div>
                            @endforeach
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <a >
                                                <div
                                                    class="service-create drop-shadow text-center h-100 d-flex flex-column justify-content-center ">
                                                    <div class="text-center">
                                                        <a href="{{route('admin.services.additional_service.create',$service->id)}}"
                                                           class="btn btn-primary btn-circle"><i
                                                                class="fas fa-plus"></i></a>
                                                        <div class="font-bold font-lg">
                                                            add new service
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                </div>

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
@section('script')
    <script>
        $('#edit_admin_service_category_id').change(function () {
            let edit_category_id = $(this).val();
            let actionURL = '{{route('admin.services.getSubCategoryBaseCategory')}}' + '/' + edit_category_id;
            $.get(actionURL, function (response) {
                if (response.status) {
                    $('#edit_service_category_id').html(response.items_html);
                }
            });
        })
    </script>
@endsection
