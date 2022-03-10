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

                <h3 class="card-label">Create Additional Service</h3>

            </div>

        </div>
        <form action="{{route('admin.services.additional_service.store')}}" method="post">
            @csrf
        <div class="card-body">
            @include('dashboard.layouts.includes.alerts.success')
            @include('dashboard.layouts.includes.alerts.errors')
            <div class="row">
                <div class="col-lg-12">
        <input name="service_id" value="{{$id}}" type="hidden">
                    <div class="form-group row">
                            <label for="">Title : </label>
                            <textarea name="title" rows="3" class="form-control form-control-solid"
                                      ></textarea>

                    </div>


                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="">deliver at same time : </label>
                            <select  name="deliver_at_same_time"  class="form-control form-control-solid">
                                <option value="1" >Same time</option>
                                <option value="0" >Additional time</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="">additional  Days : </label>

                            <div class="input-group">

                                <input type="number" name="additional_days" class="form-control form-control-solid"
                                       >
                                <div class="input-group-append">
                                    <label class="btn btn-secondary">Days</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Price : </label>

                            <div class="input-group">

                                <input type="number" name="price" class="form-control form-control-solid"  >
                                <div class="input-group-append">
                                    <label class="btn btn-secondary">$</label>
                                </div>
                            </div>
                        </div>


                    </div>



                    <div class="card-footer">
                        <button type="submit"
                                class="btn btn-primary">Save </button>
                        <a href="{{route('admin.services.edit',$id)}}"
                           class="btn btn-secondary font-weight-bold">back </a>


                    </div>
                </div>


            </div>

        </div>
        </form>
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
