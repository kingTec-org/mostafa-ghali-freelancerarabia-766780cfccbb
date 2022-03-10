@extends('web.layouts.master')
@section('content')


    <!-- begin main -->
    <main class="container-fluid">
        <a href="{{route('payment.CreatePayment')}}">دفع</a>
        <div class= " container " >
            <div class= " content_header " >
                <div class= " jumbotron " ></div>
            </div>
            <div class= " content_body " >
                <div class= " panel-group " id= " single_method " >
                    <div class= " panel panel-default " >
                        <div class= " panel-subheader " >
                            <h4 class= " panel-title " ></h4>
                        </div>
                        <div id= " collapse_card " class= " panel-collapse collapse " >
                            <div class= " panel-body " >
                                <button class= " btn btn-success " ></button>
                                <button class= " btn btn-warning " ></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class= " content_footer " ></div>
        </div>
    </main>
    <!-- end main -->

@endsection
