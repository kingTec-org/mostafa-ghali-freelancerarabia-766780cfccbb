@extends('web.layouts.master')
@section('content')
    <!-- begin top-services -->
    <div class="top-services">
        <div class="owl-carousel top-services-carousel">
            @foreach($categories as $category)
                @if(getLang() =='ar')
                    <div class="item text-center">{{$category->name_ar}}</div>
                @else
                    <div class="item text-center">{{$category->name_en}}</div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- end top-services -->

    <!-- begin main -->
    <main class="container-fluid">
        <div class="custom-card-header">
            @if(session()->has('alert-success'))
                <div class="alert alert-success" style="text-align: center">{{session()->get('alert-success')}}</div>
            @endif
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="site-padding">
            <form class="font-md" method="post" action="{{route('store.service.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row  mb-5">
                    <div class="col-12  mt-5">
                        <h1 class="font-xl text-primary">
                            {{$labels['add_new_service']}}
                        </h1>
                    </div>

                    <div class="col-12 mt-3">
                        <label for="title" class="form-label"> {{$labels['service_title']}}</label>
                        <textarea class="form-control" id="title_letters" name="service_title" rows="3"></textarea>
                        <div class="font-xs" id="count_title_letters"></div>
                    </div>
                    <div class="col-12 col-sm-6 mt-5">
                        <label class="form-label">{{$labels['category']}}</label>
                        <select class="form-control" name="service_category_id" id="service_category_id">
                            <option selected disabled>{{$labels['choose_section']}}</option>
                            @foreach($categories as $category)
                                @if(getLang() =='ar')
                                    <option value="{{$category->id}}">{{$category->name_ar}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name_en}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 mt-5">
                        <label class="form-label">{{$labels['sub_cat']}}</label>
                        <select class="form-control" name="service_sub_category_id" id="service_sub_category_id">
                            @include('web.services.subCategoryService')
                        </select>
                    </div>

                    <div class="col-12 mt-5">
                        <label for="description" class="form-label"> {{$labels['service_description']}}</label>
                        <textarea class="form-control" id="description" name="service_description" rows="3"></textarea>
                        <div class="font-xs">
                            {{$labels['enter_accurate_service_description']}}
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <label class="form-label">{{$labels['keywords']}}</label>
                        <div class="bg-light border-grey px-3 py-2 rounded">
                            <input class="form-control tagify" name="service_tags">
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <label class="form-label">{{$labels['delivery_time']}}</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="deliver_time" id="period">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Days</span>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 mt-5">
                        <label class="form-label">{{$labels['price']}}</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="service_price">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 mt-5">
                        <label for="instructions" class="form-label">{{$labels['instructions_service_buyer']}}</label>
                        <textarea class="form-control" id="instructions" name="details_for_customer"
                                  rows="3"></textarea>
                        <div class="font-xs">
                            {{$labels['details_client_should_provide']}}
                        </div>
                    </div>

                    <div class="col-12 mt-5">
                        <label class="form-label"> {{$labels['service_gallery']}}</label>

                        <div class="bg-light border-grey p-3 text-center py-5" id="galleryWrapper">
                            <div>
                                <input type="file" accept="image/png,image/jpeg,image/jpg,application/pdf"
                                       class="btn btn-primary" name="media[]" multiple id="galleryOpenBtn">
                            </div>
                            <div class="mt-3">
                            </div>
                            <div class="mt-3">
                                {{$labels['gallery_notes']}}
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <input type="checkbox" name="chk" id="chk" {{ old('chk') == 'checked' ? 'checked' : '' }} >
                            <label for="chk">{{$labels['additional_services']}}</label>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="fines-list">
                            <div id="fine-1-inputs" class="fine-inputs" style="display: none">
                                <div class="col-12 mt-5">
                                    <label class="form-label"> {{$labels['additional_services']}}</label>
                                    <div class="bg-light border-grey add-additional-service p-3">
                                        <label class="d-block mt-1">
                                            <input class="form-check-input additional-service-check" type="checkbox"
                                                   value="" name="if_add_service" data-additional-service-id="1"/> خدمة
                                            إضافية 1
                                        </label>
                                        <div class="row additional-service d-none" data-additional-service-id="1">
                                            <div class="col-12 mt-1">
                                                <label for="additionalTitle1"
                                                       class="form-label">{{$labels['service_title']}}</label>
                                                <textarea class="form-control" id="additionalTitle1"
                                                          name="additionalTitle1[]" rows="3"></textarea>
                                                <div class="font-xs" id="add_service_count_title_letters"></div>


                                            </div>
                                            <div class="col-12 mt-3">
                                                <label for="additionalProce1" class="form-label">تكلفة الاضافة $</label>
                                                <input type="text" class="form-control" id="additionalProce1"
                                                       name="additionalProce1[]" placeholder="مقابل إضافة الخدمة"/>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label class="form-label me-3">موعد التسليم</label>
                                                <div class="col-lg-6 col-xl-6">
                                                    <select class="form-control" name="additional_deliver_time[]"
                                                            id="discount_type">
                                                        <option value="1"> نفس الموعد</option>
                                                        <option value="0"> موعد اضافي</option>
                                                    </select>
                                                    <span class="invalid-feedback" role="alert"><strong></strong></span>
                                                </div>

                                                {{--                                    <label class="d-block d-md-inline ">--}}
                                                {{--                                        <input class="form-check-input additional-service-period-add" name="additionalPeriodType1" type="radio" value="1"  checked/> تسليم في نفس الموعد--}}
                                                {{--                                    </label>--}}
                                                {{--                                    <label class="d-block d-md-inline ms-0 ms-md-5">--}}
                                                {{--                                        <input class="form-check-input additional-service-period-add" name="additionalPeriodType1" type="radio" value="2" /> إضافة وقت اضافي--}}
                                                {{--                                    </label>--}}
                                                <br>
                                                <div id="add_time">
                                                    {{--                                         <span class="d-block d-md-inline ms-0 ms-md-3 d-none additional-service-period-count">--}}
                                                    {{--                          <button type="button"  class="btn btn-primary counter-btn" data-inc="1"><i class="fas fa-plus"></i></button>--}}
                                                    {{--                          <span  style="min-width:50px" class="d-inline-block text-center counter">1</span>--}}
                                                    {{--                          <button type="button"  class="btn btn-primary counter-btn" data-inc="-1" disabled><i class="fas fa-minus"></i></button>--}}
                                                    {{--                          --}}
                                                    <span class="ms-4">عدد الايام الاضافية للتسليم</span>
                                                    <input type="number" class="form-control col-lg-6 col-xl-6"
                                                           name="addtional_time[]">
                                                    {{--                         </span>--}}
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <br>
                        <button type="button" class="btn-primary addRow col-lg-3"
                                style="display: none">{{$labels['add_additional_service']}}</button>
                    </div>
                    <div class="col-12 mt-5">
                        <label for="question1" class="form-label">{{$labels['common_questions']}}</label>
                        <input type="text" class="form-control" id="question1" name="question1"
                               placeholder=" {{$labels['add_question']}}"/>
                        <textarea class="form-control mt-3" id="answer1" name="answer1" rows="3"
                                  placeholder="{{$labels['add_answer']}}"></textarea>

                    </div>
                    <div class="col-12 mt-5 text-end">
                        <button type="submit" class="btn btn-primary font-sm">
                            {{$labels['add_service']}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!-- end main -->

@endsection
@section('scripts')
    <script>

        var inputElm = document.querySelector('.tagify'),
            tagify = new Tagify(inputElm);
        $(document).ready(function () {
            $('#add_time').hide();
        });
        $('#discount_type').change(function () {
            let val = $(this).val();
            if (val === '0') {
                $('#add_time').show();
            }
        });
    </script>
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
                ' <label for="additionalTitle1" class="form-label">{{$labels['service_title']}}</label>' +
                '<textarea class="form-control" id="additionalTitle1" name="additionalTitle1[]" rows="3"></textarea>' +
                '<div class="font-xs" id="add_service_count_title_letters"></div>' +
                ' </div>' +
                '<div class="col-12 mt-3">' +
                '<label for="additionalProce1" class="form-label">{{$labels['add_cost'].' '.'$'}} </label>' +
                ' <input type="text" class="form-control" id="additionalProce1" name="additionalProce1[]" />' +
                '  </div>' +
                '<div class="col-12 mt-3">' +
                ' <label  class="form-label me-3"> {{$labels['delivery_time']}}</label>' +
                '   <div class="col-lg-6 col-xl-6">' +
                '  <select class="form-control" name="additional_deliver_time[]" id="discount_type">' +
                '  <option value="1" > {{$labels['same_date']}}</option>' +
                '     <option value="0"  > {{$labels['extra_date']}}</option>' +
                '    </select>' +
                ' <span class="invalid-feedback" role="alert"><strong></strong></span>' +
                '  </div>' +
                ' <br>' +
                ' <div id="add_time">' +
                ' <span class="ms-4">{{$labels['extra_days']}}</span>' +

                '<input type="number" class="form-control col-lg-6 col-xl-6" name="addtional_time[]" >' +
                ' </div>' +
                '<br>' +

                '<button type="button" class="btn-delete-fi btn btn-danger col-lg-3" data-id="' + finesInputsCount + '" id="btn-delete-fi-' + finesInputsCount + '">{{$labels['delete']}}</button>' +

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

        //
        // $(document).ready(function (){
        //    $('#fine_ticket_no').style(hide);
        //    $('#fine_amount').style(hide);
        //    $('#fine_reason').style(hide);
        // });

    </script>
    <script>
        var text_max = 100;
        $('#count_title_letters').html(text_max + ' {{$labels['remaining']}}');

        $('#title_letters').keyup(function () {
            var text_length = $('#title_letters').val().length;
            var text_remaining = text_max - text_length;
            $('#count_title_letters').html(text_remaining + ' {{$labels['remaining']}}');
        });

        var text_max_add_service = 100;
        $('#add_service_count_title_letters').html(text_max_add_service + ' {{$labels['remaining']}}');

        $('#additionalTitle1').keyup(function () {
            var text_length = $('#additionalTitle1').val().length;
            var text_remaining = text_max_add_service - text_length;
            $('#add_service_count_title_letters').html(text_remaining + ' {{$labels['remaining']}}');
        });
    </script>
    <script>
        $('#service_category_id').change(function () {
            let category_id = $(this).val();
            let actionURL = '{{route('services.getSubCategoryBaseCategory')}}' + '/' + category_id;
            $.get(actionURL, function (response) {
                if (response.status) {
                    $('#service_sub_category_id').html(response.items_html);
                }
            });
        })
    </script>

@endsection

