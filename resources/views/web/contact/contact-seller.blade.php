@extends('web.layouts.master')
@section('content')
    <!-- begin main -->
    <main class="container-fluid">  <div class="custom-card-header">
            @if(session()->has('alert-success'))
                <div class="alert alert-success" style="text-align: center">{{session()->get('alert-success')}}</div>
            @endif

        </div>
        @if ($errors->any())
            <div class="alert alert-danger" style="">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="w-100 site-padding">
            <div class="row px-2 py-3 mt-4">
                <div class="d-none d-sm-block col-2 col-sm-2 col-xxl-1 p-0 text-center">
                    <div class="avatar avatar-big">
                        <img src="{{asset('web_ar/img/default-avatar.jpg')}}" class="avatar-image" />
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-xxl-11 ps-0 ps-sm-2">
                    <div class="font-lg text-primary">
                           {{$labels['message_to'].' '.'('.$service->ServiceOwner->name.' '.')' }}
                    </div>
                    <div class="font-light mt-2 font-xs">
                        {{$labels['service'].' :'.' '. $service->title}}
                    </div>
                    <!-- <span class="font-light me-2 d-block d-sm-inline"
                      ><i class="fas fa-fw fa-user"></i>
                      <span class="font-xs">فيصل الفيصل</span></span
                    >
                    <span class="font-light me-2 d-block d-sm-inline"
                      ><i class="far fa-fw fa-clock"></i>
                      <span class="font-xs">منذ شهر و 10 أيام</span></span
                    > -->

                </div>
            </div>
<form action="{{route('store.contact.sendMessage')}}" method="POST">
           @csrf
        <input type="hidden" name="service_id" value="{{$service_id}}">
            <div class="row mt-4">
                <div class="col-12 text-lg">
                    <h3 class="font-lg">
                        {{$labels['message_content']}}
                    </h3>
                    <textarea class="form-control" name="message" id="message" cols="30" rows="7"></textarea>
                    <br>
                    <h6 class="pull-right" id="count_message"></h6>

                    <p class="font-xs font-light">
                        {{$labels['ask_service_owner']}}
                    </p>

                    <div class="mt-5 font-xs">
                        <label>
                            <input class="form-check-input" type="checkbox"  name="check_message_does_not_contain"  />
                            {{$labels['message_does_not_contain']}}</label
                        >
                        <label
                        >
                    </div>
                    <div class="mt-1 mt-lg-3 mb-5 font-xs">
                        <input class="form-check-input" type="checkbox"  name="check_terms_conditions"  />

                         {{$labels['I_checked']}} <a href="{{route('store.terms_conditions')}}" class="text-primary"> {{$labels['terms_conditions']}}</a>{{$labels['this_message']}}
                        </label >
                    </div>
                    <div class="text-end mb-5">
                          <button type="submit" class="btn btn-primary font-sm">{{$labels['send_message']}}</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </main>
    <!-- end main -->

@endsection
@section('scripts')
<script>
    var text_max = 100;
    $('#count_message').html(text_max + ' {{$labels['remaining']}}');

    $('#message').keyup(function() {
        var text_length = $('#message').val().length;
        var text_remaining = text_max - text_length;
        $('#count_message').html(text_remaining + ' {{$labels['remaining']}}');
    });
</script>
@endsection
