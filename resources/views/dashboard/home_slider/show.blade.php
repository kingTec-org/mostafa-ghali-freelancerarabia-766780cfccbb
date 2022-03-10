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
															<rect x="0" y="0" width="24" h  eight="24"/>
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

                <h3 class="card-label">Show Home Slider</h3>
            </div>

        </div>
        <div class="card-body">
        @include('dashboard.layouts.includes.alerts.success')
        @include('dashboard.layouts.includes.alerts.errors')
        <!--begin: Datatable-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for=""> First title Arabic : </label>
                            <textarea name="title_1_ar"
                                      class="form-control form-control-solid @error('title_1_ar') is-invalid  @enderror"
                                      rows="4" disabled>{{$home_slider->title_1_ar}}</textarea>

                        </div>
                        <div class="col-lg-6">
                            <label for="">Second title Arabic : </label>

                            <textarea name="title_2_ar"
                                      class="form-control form-control-solid @error('title_2_ar') is-invalid  @enderror"
                                      rows="4" disabled>{{$home_slider->title_2_ar}}</textarea>

                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for=""> First title English : </label>
                            <textarea name="title_1_en"
                                      class="form-control form-control-solid @error('title_1_en') is-invalid  @enderror"
                                      rows="4" disabled>{{$home_slider->title_1_en}}</textarea>

                        </div>
                        <div class="col-lg-6">
                            <label for="">Second title English : </label>

                            <textarea name="title_2_en"
                                      class="form-control form-control-solid @error('title_2_en') is-invalid  @enderror"
                                      rows="4" disabled>{{$home_slider->title_2_en}}</textarea>

                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for=""> First Description Arabic : </label>
                            <textarea name="description_1_ar"
                                      class="form-control form-control-solid @error('description_1_ar') is-invalid  @enderror"
                                      rows="4" disabled>{{$home_slider->description_1_ar}}</textarea>

                        </div>
                        <div class="col-lg-6">
                            <label for="">Second Description Arabic : </label>

                            <textarea name="description_2_ar"
                                      class="form-control form-control-solid @error('description_2_ar') is-invalid  @enderror"
                                      rows="4" disabled>{{$home_slider->description_2_ar}}</textarea>

                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for=""> First Description English : </label>
                            <textarea name="description_1_en"
                                      class="form-control form-control-solid @error('description_1_en') is-invalid  @enderror"
                                      rows="4" disabled>{{$home_slider->description_1_en}}</textarea>

                        </div>
                        <div class="col-lg-6">
                            <label for="">Second Description English : </label>

                            <textarea name="description_2_en"
                                      class="form-control form-control-solid @error('description_2_en') is-invalid  @enderror"
                                      rows="4" disabled>{{$home_slider->description_2_en}}</textarea>

                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="">image : </label>
                            <br>
                            <div class="image-input image-input-outline " id="kt_image_1"
                                 style="background-image: url('{{$home_slider->image}}'); ">
                                <div class="image-input-wrapper"
                                     style="background-image: url('{{$home_slider->image}}'); "></div>


                            </div>

                        </div>

                    </div>


                    <div class="card-footer">
                        <a href="{{route('admin.home_slider.index')}}"
                           class="btn btn-secondary font-weight-bold">back </a>

                    </div>
                </div>
            </div>


        </div>


    </div>
    </div>
    <!--end::Card-->

@endsection


