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
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
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

                <h3 class="card-label">New Service</h3>
            </div>

        </div>
        <div class="card-body">
        @include('dashboard.layouts.includes.alerts.success')
        @include('dashboard.layouts.includes.alerts.errors')
        <!--begin: Datatable-->
            <form class="form" method="POST" action="{{route('admin.services.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for=""> service Owner : </label>
                                <select name="admin_user_id" id="user_id"
                                        class="form-control form-control-solid @error('admin_user_id') is-invalid  @enderror">
                                    <option value=""> Select Service Owner</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>

                                    @endforeach
                                </select>
                                @error('admin_user_id')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">title : </label>
                                <input type="text" name="admin_service_title"
                                       class="form-control form-control-solid @error('admin_service_title') is-invalid  @enderror">
                                @error('admin_service_title')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for=""> Category : </label>

                                <select class="form-control form-control-solid" name="admin_service_category_id" id="admin_service_category_id">
                                    <option selected disabled>Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name_en}}</option>
                                    @endforeach
                                </select>
                                </select>
                                @error('admin_category')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Sub Category</label>
                                <select class="form-control form-control-solid @error('admin_service_category_id') is-invalid  @enderror" name="admin_service_sub_category_id"
                                        id="service_category_id">
                                    @include('dashboard.services.subCategoryService')
                                </select>
                                @error('admin_service_category_id')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="">deliver time : </label>
                                <div class="input-group">

                                    <input type="number" min="1" name="admin_deliver_time"
                                           class="form-control form-control-solid @error('admin_deliver_time') is-invalid  @enderror">
                                    <div class="input-group-append">
                                        <label class="btn btn-secondary">Days</label>
                                    </div>
                                </div>
                                @error('admin_deliver_time')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-6">
                                <label for="">Price : </label>
                                <div class="input-group">

                                    <input type="number" min="1" name="admin_service_price"
                                           class="form-control form-control-solid @error('admin_service_price') is-invalid  @enderror">
                                    <div class="input-group-append">
                                        <label  class="btn btn-secondary">$</label>
                                    </div>
                                </div>
                                @error('admin_service_price')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="">Description : </label>
                                <div class="input-group">
                                    <textarea name="admin_service_description" rows="3"
                                              class="form-control form-control-solid @error('admin_service_description') is-invalid  @enderror"></textarea>
                                </div>
                                @error('admin_service_description')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Details For Customer : </label>
                                <div class="input-group">
                                    <textarea name="admin_details_for_customer" rows="3"
                                              class="form-control form-control-solid @error('admin_details_for_customer') is-invalid  @enderror"></textarea>
                                </div>
                                @error('admin_details_for_customer')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="">image : </label>
                                <br>
                                <div class="image-input image-input-outline " id="kt_image_1"
                                     style="background-image: url(''); ">
                                    <div class="image-input-wrapper"
                                         style="background-image: url(''); "></div>

                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow "
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="add image">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
                                        <input type="file" name="admin_media[]"
                                               accept=".png, .jpg, .jpeg , .gif, .svg" multiple/>

                                    </label>
                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow col-lg-6"
                                        data-action="cancel" data-toggle="tooltip"
                                        title="delete image ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-x"
                                                                 viewBox="0 0 16 16">
                                                            <path
                                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                        </svg> 														</span>
                                    <span
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                        data-action="remove" data-toggle="tooltip"
                                        title="delete image ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor" class="bi bi-x"
                                                                 viewBox="0 0 16 16">
                                                            <path
                                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                        </svg>
                                        </span>
                                    @error('admin_media')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label  class="form-label">{{$labels['keywords']}}</label>
                                <div class="">
                                    <input class="form-control tagify" name="admin_service_tags" >
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <div class="input-group">
                                <input type="checkbox" name="admin_chk"
                                       id="chk" {{ old('chk') == 'checked' ? 'checked' : '' }} >
                                <label for="chk">additional services</label>
                            </div>
                            <div class="card-body">
                                <div id="fines-list">
                                    <div id="fine-1-inputs" class="fine-inputs" style="display: none">
                                        <div class="col-12 mt-5">
                                            <label class="form-label"> additional services</label>
                                            <div class="bg-light border-grey add-additional-service p-3">
                                                <label class="d-block mt-1">
                                                    <input class="form-check-input additional-service-check"
                                                           type="checkbox" value="" name="admin_if_add_service"
                                                           data-additional-service-id="1"/> خدمة إضافية 1
                                                </label>
                                                <div class="row additional-service d-none"
                                                     data-additional-service-id="1">
                                                    <div class="col-12 mt-1">
                                                        <label for="additionalTitle1"
                                                               class="form-label">service title </label>
                                                        <textarea class="form-control" id="additionalTitle1"
                                                                  name="admin_additionalTitle1[]" rows="3"></textarea>
                                                        <div class="font-xs" id="add_service_count_title_letters"></div>


                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <label for="additionalProce1" class="form-label">تكلفة الاضافة
                                                            $</label>
                                                        <input type="text" class="form-control" id="additionalProce1"
                                                               name="admin_additionalProce1[]"
                                                               placeholder="مقابل إضافة الخدمة"/>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <label  class="form-label me-3">موعد التسليم</label>
                                                        <div class="col-lg-6 col-xl-6">
                                                            <select class="form-control" name="admin_additional_deliver_time[]" id="discount_type">
                                                                <option value="1" > نفس الموعد</option>
                                                                <option value="0"  > موعد اضافي</option>
                                                            </select>
                                                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                                                        </div>

                                                        <div id="add_time">

                                                            <span class="ms-4">عدد الايام الاضافية للتسليم</span>
                                                            <input type="number" class="form-control col-lg-6 col-xl-6"
                                                                   name="admin_addtional_time[]">
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <br>
                                <button type="button" class="btn btn-bg-primary addRow"
                                        style="display: none">add additional service </button>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="question1" class="form-label">common questions </label>
                            <input type="text" class="form-control @error('admin_question1') is-invalid  @enderror" id="question1" name="admin_question1"
                                   placeholder=" add question"/>
                            @error('admin_question1')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                            <textarea class="form-control mt-3 @error('admin_answer1') is-invalid  @enderror" id="answer1" name="admin_answer1" rows="3"
                                      placeholder="add_answer"></textarea>
                            @error('admin_answer1')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary font-weight-bold">save</button>
                    <a href="{{route('admin.services.index')}}"
                       class="btn btn-secondary font-weight-bold">back </a>

                </div>


        </div>


        </form>            <!--end: Datatable-->
    </div>


    </div>
    <!--end::Card-->

@endsection
@section('script')
    <script>
        $('#chk').change(function () {
            $this = $(this);
            console.log($this);
            if ($this.is(':checked')) {
                addFineInputs();
            } else {
                $('#fines-list').html('');
                $('.addRow').hide();
            }
        });
        $('.addRow').on('click', function () {
            addFineInputs();
        });

        function addFineInputs() {

            let finesInputsCount = $('.fine-inputs').length;
            finesInputsCount += 1;
            let finesHtml = '<div id="fine-' + finesInputsCount + '-inputs" class="fine-inputs"><div class="form-group row">' +
                '   <div class="col-12 mt-5">' +
                ' <div class="row additional-service">' +
                '  <div class="col-12 mt-1">' +
                ' <label for="additionalTitle1" class="form-label">service title</label>' +
                '<textarea class="form-control" id="additionalTitle1" name="admin_additionalTitle1[]" rows="3"></textarea>' +
                '<div class="font-xs" id="add_service_count_title_letters"></div>' +
                ' </div>' +
                '<div class="col-12 mt-3">' +
                '<label for="additionalProce1" class="form-label">add cost $ </label>' +
                ' <input type="text" class="form-control" id="additionalProce1" name="admin_additionalProce1[]" />' +
                '  </div>' +
                '</div>' +
                ' <br>' +
                '<div class="col-12 mt-3">'+
                ' <label  class="form-label me-3">delivery time</label>'+
                '   <div class="col-lg-6 col-xl-6">'+
                '  <select class="form-control" name="admin_additional_deliver_time[]" id="discount_type">'+
                '  <option value="1" > same_date</option>'+
                '     <option value="0"  > extra date</option>'+
                '    </select>'+
                ' <span class="invalid-feedback" role="alert"><strong></strong></span>'+
                '  </div>'+
                ' <br>'+
                ' <div id="add_time">' +
                ' <span class="ms-4">extra days </span>' +

                '<input type="number" min="1" class="form-control col-lg-6 col-xl-6" name="admin_addtional_time[]" >' +
                ' </div>' +
                '<br>' +

                '<button type="button" class="btn-delete-fi btn btn-danger" data-id="' + finesInputsCount + '" id="btn-delete-fi-' + finesInputsCount + '">delete</button>' +

                '   </div>' +

                '</div>' +

                ' </div>' +

                ' </div>' +
                '</div>' +
                '</div>';

            $('#fines-list').append(finesHtml);
            $('.addRow').show();
        }

        $(document).on('click', '.btn-delete-fi', function () {
            let ID = $(this).attr('data-id');
            $('#fine-' + ID + '-inputs').remove();
        });


    </script>
    <script>
        var avatar1 = new KTImageInput('kt_image_1');
        avatar1.on('cancel', function (imageInput) {
            swal.fire({
                title: 'Delete Success',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Delete',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });
        $('#user_id').select2();
    </script>
    <script>
        $('#admin_service_category_id').change(function () {
            let category_id = $(this).val();
            let actionURL = '{{route('admin.services.getSubCategoryBaseCategory')}}' + '/' + category_id;
            $.get(actionURL, function (response) {
                if (response.status) {
                    $('#admin_service_sub_category_id').html(response.items_html);
                }
            });
        })
    </script>
    <script>

        var inputElm = document.querySelector('.tagify'),
            tagify = new Tagify (inputElm);
        $(document).ready(function (){
            $('#add_time').hide();
        });
        $('#discount_type').change(function(){
            let val = $(this).val();
            if (val === '0') {
                $('#add_time').show();
            }
        });
    </script>
@endsection
