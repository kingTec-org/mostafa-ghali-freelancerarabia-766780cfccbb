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
                <h3 class="card-label">Services</h3>
            </div>
            <div class="card-toolbar">

                <!--begin::Button-->
                <a href="{{route('admin.services.create')}}" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>New Service</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mt-2 mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..."
                                           id="kt_datatable_search_query"/>
                                    <span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">All</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Delivered</option>
                                        <option value="3">Canceled</option>
                                        <option value="4">Success</option>
                                        <option value="5">Info</option>
                                        <option value="6">Danger</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                    <select class="form-control" id="kt_datatable_search_type">
                                        <option value="">All</option>
                                        <option value="1">Online</option>
                                        <option value="2">Retail</option>
                                        <option value="3">Direct</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->
            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->

@endsection
@section('script')
    <script src="{{ asset('template/js/datatable/services.js') }}"></script>
    <script>
        $(document).on('click', '.delete_services', function (event) {
            event.preventDefault();
            var services_id = $(this).attr('data-id');
            Swal.fire({
                title: "Are you sure?",
                text: "You won’t be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: 'delete',
                        url: "{{route('admin.services.delete')}}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id': services_id,
                        },
                        success: function (data) {
                            console.log(services_id);
                            console.log('.ServiceRow' + data.services_id);
                            $('.ServiceRow' + services_id).closest('tr').css('background', '#714f4f').delay(100).hide(100);

                            if (data.status == true) {
                                Swal.fire(
                                    "Deleted!",
                                    "Your file has been deleted.",
                                    "success"
                                )
                            }
                        },


                    })

                }
            })


        })

        $(document).on('click', '.accept_services', function (event) {
            event.preventDefault();
            var service_id = $(this).attr('data-id');
            let admin_accept =$(this).attr('data-value');
          if(admin_accept ==0){
              Swal.fire({
                  title: "Accept Service On Site?",
                  text: "Accepted and Published on the site !",
                  icon: "info",
                  showCancelButton: true,
                  confirmButtonText: "Yes, Accept it!",
                  cancelButtonText: "No, cancel!",
                  reverseButtons: true
              }).then(function (result) {
                  if (result.value) {
                      $.ajax({
                          type: 'post',
                          url: "{{route('admin.services.accept')}}",
                          data: {
                              "_token": "{{ csrf_token() }}",
                              'id': service_id,
                          },
                          success: function (data) {

                              if (data.status == true) {
                                  Swal.fire('The service has been accepted and published on the site');
                              }
                          },


                      })

                  }
              })
          }else {
              Swal.fire('The service is already accepted and published on the site');

          }



        })
    </script>
@endsection
