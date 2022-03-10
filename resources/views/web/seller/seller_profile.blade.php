@extends('web.layouts.master')
@section('content')
    <div class="container py-5">

        <div class="custom-card-header mt-5">
            @if(session()->has('alert-success'))
                <div class="alert alert-success" style="text-align: center">{{session()->get('alert-success')}}</div>
            @endif
        </div>

        <form method="post"  enctype="multipart/form-data">

            @csrf
            <div class="custom-card">
                <input name="id" type="hidden" value="{{auth('web')->user()->id}}">
                <div class="custom-card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>{{$labels['name']}}</label>
                            <input class="form-control" name="user_name" id="name"
                                   value="{{auth('web')->user()->name}}">
                        </div>
                        <div class="col-lg-6">
                            <label>{{$labels['job']}}  </label>
                            <input type="text" class="form-control" name="work_title"
                                   value="{{auth('web')->user()->work_title}}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>{{$labels['skills']}}</label>
                            <input class="form-control tagify" name="skills[]" value="{{@$tags}}">
                        </div>
                        <div class="col-lg-6">
                            <label for="education">{{$labels['education']}}</label>
                            <input class="form-control" name="education" id="education"
                                   value="{{auth('web')->user()->education}}">
                        </div>
                    </div>
                    <br>

                    <div class="row">

                        <div class="col-lg-6">
                            <label>{{$labels['university']}}</label>
                            <input class="form-control" type="text" name="university"
                                   value="{{auth('web')->user()->university}}">

                        </div>

                        <div class="col-lg-6">
                            <label>{{$labels['graduation_date']}}</label>
                            <input type="date" class="form-control" name="graduation_date"
                                   value="{{auth('web')->user()->graduation_date}}">
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label> {{$labels['about']}}  </label>
                            <textarea class="form-control" rows="3"
                                      name="description"> {{auth('web')->user()->description}} </textarea>
                        </div>
                        <div class="col-lg-6">
                            <label>{{$labels['country']}}</label>
                            <input class="form-control" type="text" name="country"
                                   value="{{auth('web')->user()->country}}">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">{{$labels['personal_photo']}}</label>
                            <br>
                            <label for="personal_image">
                                @if(!is_null(auth('web')->user()->image))
                                    <img src="{{asset(auth('web')->user()->image)}}" width="150px" height="150px"
                                         style="border-radius:25px ">
                                @else
                                    <img src="{{asset('web_ar/img/default-avatar.jpg')}}" width="150px" height="150px"
                                         style="border-radius:25px ">
                                @endif
                            </label>
                            <input type="file" id="personal_image" class="form-control" name="image"
                                   style="display: none">
                        </div>
                        <div class="col-lg-6">
                            <label for="">{{$labels['scientific_certificate']}}</label>
                            <br>
                            <label for="certificates">
                                @if(!is_null(auth('web')->user()->certificate_image))
                                    <img src="{{asset(auth('web')->user()->certificate_image)}}" width="150px"
                                         height="150px" style="border-radius:25px ">
                                @else
                                    <label for="certificates"><img src="{{asset('web_ar/img/25010166.jpg')}}"
                                                                   width="150px" height="150px"
                                                                   style="border-radius:25px "> </label>
                                @endif
                            </label>

                            <input type="file" id="certificates" class="form-control" name="certificates"
                                   style="display: none">
                        </div>
                    </div>
                    <br>


                    <div class="row">
                        <h3> {{$labels['languages']}}  </h3>

                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <label> {{$labels['languages']}}  </label>

                                        <select class="form-control languages_input" name="languages_input">

                                            @foreach($Languages as $lang)
                                                <option value="{{$lang->id}}">{{$lang->lang_name_automated}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-4">
                                        <label> {{$labels['level']}}  </label>

                                        <select class="form-control level_input" name="level_input">

                                            @foreach($languages_level as $level=>$value)
                                                <option value="{{$value}}">{{ $labels[$level]}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-4  pt-3">
                                        <a type="button" class="btn btn-primary add_languages">Add <i
                                                class="fa fa-plus"></i>
                                        </a>


                                    </div>

                                </div>


                                <hr>
                                <div class="languages_list">
                                    @foreach($user_languages as $index=>$user_language )

                                        <div class="row lang_item" data-id="{{$user_language->language_id}}">
                                            <div class="col-md-4">
                                                <label> {{$labels['languages']}}  </label>
                                                <input type='hidden' name="languages[{{$index}}][language_id]" value="{{$user_language->language_id}}">

                                                <select class="form-control lang_section"   disabled>

                                                    @foreach($Languages as $lang)
                                                        <option
                                                            value="{{$lang->id}}" {{$user_language->language_id ==$lang->id?"selected":""}}  >{{$lang->lang_name_automated}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-4">
                                                <label> {{$labels['level']}}  </label>

                                                <select class="form-control" name="languages[{{$index}}][level]">

                                                    @foreach($languages_level as $level=>$value)
                                                        <option value="{{$value}}"  {{$user_language->level ==$value?"selected":""}}> {{ $labels[$level]}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-4 d-flex align-items-center pt-3">
                                                <button class="btn btn-outline-danger delete_lang" type="button"><i class="fa fa-trash"></i></button>


                                            </div>
                                        </div>

                                    @endforeach

                                </div>


                            </div>
                        </div>

                    </div>
                    <br>


                    <div class="row">
                        <h3> {{$labels['your_occupation']}}  </h3>

                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <label> {{$labels['category']}}  </label>

                                        <select class="form-control occupation" name="occupation[0][category_id]">

                                            @foreach($categories as $cat)
                                                <option
                                                    value="{{$cat->id}}" {{@$user_occupations->category_id == $cat->id?'selected':""}}>{{$cat['name_'.app()->getLocale()]}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-4">
                                        <label> {{$labels['from']}}  </label>

                                        <input type="year" name="occupation[0][from]" class="form-control"
                                               placeholder="" value="{{@$user_occupations->from}}">


                                    </div>
                                    <div class="col-md-4">
                                        <label> {{$labels['to']}}  </label>

                                        <input type="year" name="occupation[0][to]" class="form-control"  value="{{@$user_occupations->to}}" placeholder="">


                                    </div>


                                    <div class="col-md-12 sub_categories_list row mt-2">

                                        @foreach($sub_categories_list as $sub_i )

                                        <div class="col-md-3 form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" {{in_array($sub_i->id,$user_sub_categories )?"checked":""}} type="checkbox" name="sub_categories[]" id="gridCheck${{$sub_i->id}}"  value='{{$sub_i->id}}'>
                                                <label class="form-check-label" for="gridCheck${{$sub_i->id}}">
                                                    {{$sub_i['name_' .app()->getLocale()]}}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>
                    <br>
                    <div class=" card-footer ">
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-success">{{$labels['update']}}</button>
                            </div>

                        </div>
                    </div>



                </div>

            </div>
        </form>

    </div>


@endsection

@section('scripts')
    <script>
        var inputElm = document.querySelector('.tagify'),
            tagify = new Tagify(inputElm);
    </script>


    <script>


        var lang_index = {!! count($languages_level) !!} + 1
        var languages = {!! $Languages !!}
        $(document).on('click', '.add_languages', function (event) {

            event.preventDefault();
            let languages_val = $('[name=languages_input]').val();
            let level_val = $('[name=level_input]').val();
            if (!languages_val || !level_val) return;


            console.log('languages_list', languages_val);
            $('.languages_list').append(`
                                                <div class="row lang_item" data-id="${languages_val}">
                                        <div class="col-md-4">
                                            <label> {{$labels['languages']}}  </label>

                                                  <input type='hidden' name='languages[${lang_index}][language_id]' value="${languages_val}">
                                            <select class="form-control lang_section" name="languages[${lang_index}][language_id]" disabled>

                                                @foreach($Languages as $lang)
            <option
                value="{{$lang->id}}" ` + ({!!  $lang->id!!} == languages_val ? "selected" : "") + `>{{$lang->lang_name_automated}}</option>
                                                @endforeach
            </select>

        </div>
        <div class="col-md-4">
            <label> {{$labels['level']}}  </label>

                                            <select class="form-control" name="languages[${lang_index}][level]">

                                                @foreach($languages_level as $level=>$value)
            <option value="{{$value}}"   ` + ({!!  $value!!} == level_val ? "selected" : "") + `> {{ $labels[$level]}}</option>
                                                @endforeach
            </select>

        </div>
        <div class="col-md-4 d-flex align-items-center pt-3">
            <button class="btn btn-outline-danger delete_lang" type="button"><i class="fa fa-trash"></i></button>


        </div>
    </div>
`);

            refreshLangSelect();

            lang_index++;


        })
        $(document).on('click', '.delete_lang', function (event) {
            event.preventDefault();

            let parent = $(this).parents('.lang_item').fadeOut(function () {
                $(this).remove();

                refreshLangSelect();

            });
        });
        $(document).on('change', '.occupation', function (event) {
            // event.preventDefault();


            console.log('occupation');
            fillSubcategory();


        });


        function refreshLangSelect() {

            $select_langoages = [];

            $('.languages_list .lang_item').each(function (index, item) {
                // console.log(item   index)
                let val = $(item).data('id');
                console.log(val)

                if (val != "undefined")
                    $select_langoages.push(val);


            });
            $select_langoages
            console.log($select_langoages)

            $options = '';


            languages.forEach(function (item) {
                if (!$select_langoages.includes(item.id)) {
                    $options += `<option value='${item.id}'>${item.lang_name_automated}</option>`;
                }


                $('.languages_input').html($options);

            });
        }

        function fillSubcategory() {

            let subCategories = {!!$sub_categories  !!};
            let val = $('.occupation').val();


            $options = "";
            subCategories.forEach(function (item) {
                if (val == item.category_id) {
                    $options += `  <div class="col-md-3 form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="sub_categories[]" id="gridCheck${item.id}"  value='${item.id}'>
      <label class="form-check-label" for="gridCheck${item.id}">
       ${item['name_' + "{{app()->getLocale()}}"]}
      </label>
    </div>
  </div>`
                }


            });

            console.log('sub_categories_list', $options)

            $('.sub_categories_list').html($options);

        }

        refreshLangSelect()
    </script>
@endsection
