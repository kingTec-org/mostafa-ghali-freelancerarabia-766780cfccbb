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

                <h3 class="card-label">Edit Category</h3>
            </div>
        </div>
        <div class="card-body">
        @include('dashboard.layouts.includes.alerts.success')
        @include('dashboard.layouts.includes.alerts.errors')
        <!--begin: Datatable-->
            <form class="form" method="POST" action="{{route('admin.sub_category.update')}}"
                  enctype="multipart/form-data">
               <input type="hidden"  name="id" value="{{$subcategory->id}}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for=""> Name Arabic : </label>
                                <textarea rows="3" name="name_ar"
                                          class="form-control form-control-solid @error('name_ar') is-invalid  @enderror">{{$subcategory->name_ar}}</textarea>
                                @error('name_ar')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="">Name English : </label>
                                <textarea rows="3" name="name_en"
                                          class="form-control form-control-solid @error('name_en') is-invalid  @enderror">{{$subcategory->name_en}}</textarea>
                                @error('name_en')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for=""> Category : </label>
                            <select type="text" name="category"
                                    class="form-control form-control-solid @error('category') is-invalid  @enderror">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}" {{$subcategory->category_id == $category->id?'selected':'' }}>{{$category->name_en}} </option>
                                @endforeach
                            </select>
                            @error('category')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                          <label class=" col-form-label">Is Popular : </label>
                                               <span class="switch switch-icon ">

																<label>
																	<input type="checkbox"
                                                                           name="is_popular"
                                                                           {{$subcategory->is_popular  ?"checked":'' }}  value="1">
																	<span></span>
																</label>
															</span>
                            </div>

                        </div>


                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="">image : </label>
                                <br>
                                <div class="image-input image-input-outline " id="kt_image_1"
                                     style="background-image: url('{{$subcategory->image}}');background-color: black ">
                                    <div class="image-input-wrapper"
                                         style="background-image:  url('{{$subcategory->image}}'); background-color: black"></div>

                                    <label
                                        class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow "
                                        data-action="change" data-toggle="tooltip" title=""
                                        data-original-title="add image">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
                                        <input type="file" name="image"
                                               accept=".png, .jpg, .jpeg, .gif, .svg"/>

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
                                    @error('image')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                        </div>



                    </div>
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary font-weight-bold">save</button>
                    <a href="{{route('admin.sub_category.index')}}"
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
        var avatar1 = new KTImageInput('kt_image_1');
        avatar1.on('cancel', function (imageInput) {
            swal.fire({
                title:'Delete Success',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Delete',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });
    </script>
@endsection

