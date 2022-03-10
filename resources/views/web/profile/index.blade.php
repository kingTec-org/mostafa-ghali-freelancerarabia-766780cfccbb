@extends('web.layouts.master')
@section('content')
    <main>
        <div class="custom-card-header">
            @if(session()->has('alert-success'))
                <div class="alert alert-success" style="text-align: center">{{session()->get('alert-success')}}</div>
            @endif
        </div>

<form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">

@csrf
        <div class="custom-card">
           <input name="id" type="hidden" value="{{auth('web')->user()->id}}">
            <div class="custom-card-body">
                <div class="row">
                   <div class="col-lg-6">
                       <label>{{$labels['name']}}</label>
                       <input class="form-control" name="user_name" id="name" value="{{auth('web')->user()->name}}">
                   </div>
                    <div class="col-lg-6">
                        <label>{{$labels['job']}}  </label>
                        <input type="text"  class="form-control" name="work_title" value="{{auth('web')->user()->work_title}}">
                    </div>
                </div>
                <br>
                <div class="row">
                   <div class="col-lg-6">
                       <label>{{$labels['skills']}}</label>
                       <input class="form-control tagify" name="skills" value="{{$tags}}">
                   </div>
                    <div class="col-lg-6">
                        <label for="education">{{$labels['education']}}</label>
                        <input class="form-control" name="education" id="education" value="{{auth('web')->user()->education}}">
                    </div>
                </div>
                <br>

                <div class="row">

                    <div class="col-lg-6">
                        <label>{{$labels['university']}}</label>
                        <input class="form-control" type="text" name="university" value="{{auth('web')->user()->university}}">

                    </div>

                    <div class="col-lg-6">
                        <label>{{$labels['graduation_date']}}</label>
                        <input type="date" class="form-control" name="graduation_date" value="{{auth('web')->user()->graduation_date}}">
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <label> {{$labels['about']}}  </label>
                        <textarea class="form-control" rows="3" name="description"> {{auth('web')->user()->description}} </textarea>
                    </div>
                    <div class="col-lg-6">
                        <label>{{$labels['country']}}</label>
                        <input class="form-control" type="text" name="country" value="{{auth('web')->user()->country}}">
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="">{{$labels['personal_photo']}}</label>
                        <br>
                        <label for="personal_image" >
                           @if(!is_null(auth('web')->user()->image))
                                <img src="{{asset(auth('web')->user()->image)}}" width="150px" height="150px" style="border-radius:25px ">
                            @else
                                <img src="{{asset('web_ar/img/default-avatar.jpg')}}" width="150px" height="150px" style="border-radius:25px ">
                            @endif
                        </label>
                        <input type="file" id="personal_image"  class="form-control" name="image" style="display: none">
                    </div>
                    <div class="col-lg-6">
                        <label for="">{{$labels['scientific_certificate']}}</label>
                        <br>
                        <label for="certificates">
                            @if(!is_null(auth('web')->user()->certificate_image))
                                <img src="{{asset(auth('web')->user()->certificate_image)}}" width="150px" height="150px" style="border-radius:25px ">
                            @else
                                <label for="certificates" ><img src="{{asset('web_ar/img/25010166.jpg')}}" width="150px" height="150px" style="border-radius:25px ">  </label>
                            @endif
                        </label>

                        <input type="file" id="certificates"  class="form-control" name="certificates" style="display: none">
                    </div>
                </div>
                <br>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success">{{$labels['update']}}</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
</form>
    </main>

@endsection

@section('scripts')
    <script>
        var inputElm = document.querySelector('.tagify'),
            tagify = new Tagify (inputElm);
    </script>
@endsection
