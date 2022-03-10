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

                <h3 class="card-label">Show General Questions</h3>
            </div>

        </div>
        <div class="card-body">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for=""> Question Arabic : </label>
                                <textarea name="question_ar"
                                          class="form-control form-control-solid @error('question_ar') is-invalid  @enderror"
                                          rows="4" disabled>{{$g_q->question_ar}}</textarea>

                            </div>
                            <div class="col-lg-6">
                                <label for="">Question English : </label>

                                <textarea name="question_en"
                                          class="form-control form-control-solid @error('question_en') is-invalid  @enderror"
                                          rows="4" disabled>{{$g_q->question_en}}</textarea>

                            </div>

                        </div>


                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for=""> Answer Arabic : </label>
                                <textarea name="answer_ar"
                                          class="form-control form-control-solid @error('answer_ar') is-invalid  @enderror"
                                          rows="4" disabled>{{$g_q->answer_ar}}</textarea>

                            </div>
                            <div class="col-lg-6">
                                <label for="">Answer English : </label>

                                <textarea name="answer_en"
                                          class="form-control form-control-solid @error('answer_en') is-invalid  @enderror"
                                          rows="4" disabled>{{$g_q->answer_en}}</textarea>

                            </div>

                        </div>


                        <div class="card-footer">
                            <a href="{{route('admin.general_questions.index')}}"
                               class="btn btn-secondary font-weight-bold">back </a>

                        </div>
                    </div>
                </div>


        </div>


    </div>
    </div>
    <!--end::Card-->

@endsection
