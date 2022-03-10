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

                <h3 class="card-label">Show Customer</h3>
            </div>

        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-lg-12">

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for=""> Name : </label>
                            <input type="text" name="name"
                                   class="form-control form-control-solid @error('name') is-invalid  @enderror"
                                   value="{{$user->name}}" disabled>
                            @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Email : </label>
                            <input type="email" name="email"
                                   class="form-control form-control-solid @error('email') is-invalid  @enderror"
                                   value="{{$user->email}}" disabled>
                            @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for=""> country : </label>
                            <input type="text" name="name"
                                   class="form-control form-control-solid"
                                   value="{{$user->country}}" disabled>

                        </div>
                        <div class="col-lg-6">
                            <label for=""> active : </label>
                            <input class="form-control form-control-solid"
                                   value="{{$user->active ?'Enabled':'Not enabled'}}" disabled>
                            @error('password')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>


                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for=""> education : </label>
                            <input class="form-control form-control-solid " value="{{$user->education}}" disabled>
                            @error('password')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for=""> university : </label>
                            <input class="form-control form-control-solid " value="{{$user->university}}" disabled>

                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for=""> work title : </label>
                            <input class="form-control form-control-solid " value="{{$user->work_title}}" disabled>

                        </div>

                        <div class="col-lg-6">
                            <label for=""> graduation date : </label>
                            <input type="date" class="form-control form-control-solid " value="{{$user->graduation_date}}" disabled>

                        </div>


                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="">description : </label>
                            <textarea rows="3" class="form-control form-control-solid"
                                      disabled>{{$user->description}}</textarea>

                        </div>
                        <div class="col-lg-6">
                            <label for="">Service Buy Time : </label>

                            <div class="input-group">

                                <input class="form-control form-control-solid" disabled
                                       value="{{$buy_times}}">
                                <div class="input-group-append">
                                    <label class="btn btn-secondary">Times</label>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label for=""> image : </label>
                            <br>
                            <img src="{{$user->image}}" width="100px" height="100px">
                        </div>
                        <div class="col-lg-6">
                            <label for=""> certificate image : </label>
                            <br>
                            <img src="{{$user->certificate_image}}"  width="100px" height="100px">
                        </div>

                    </div>


                    <div class="card-footer">
                        <a href="{{route('admin.customers.index')}}"
                           class="btn btn-secondary font-weight-bold">back </a>

                    </div>
                </div>


            </div>


        </div>
    </div>
    <!--end::Card-->

@endsection
