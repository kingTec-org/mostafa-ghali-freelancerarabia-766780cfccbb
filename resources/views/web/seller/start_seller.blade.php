@extends('web.layouts.master')
@section('content')
    <main>
        <div class="container">

            <div class="custom-card-header">
                @if(session()->has('alert-success'))
                    <div class="alert alert-success" style="text-align: center">{{session()->get('alert-success')}}</div>
                @endif
            </div>


            <div class="row mt-5 pt-5">
                @foreach($categories as $category)

                    <div class="col-md-3 mb-3">
                        <div class="card">

                            <img class="card-img-top" src="{{$category->image}}" alt="Card image cap">
                            <div class="card-body">
                                {{--                            <h5 class="card-title">{{{$category['name_'.app()->getLocale()]}}}</h5>--}}
                                {{--                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
                                <a href="{{route('seller.seller_on_boarding',['category'=>$category])}}" class="btn btn-primary"> {{{$category['name_'.app()->getLocale()]}}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>



        </main>

@endsection

@section('scripts')
    <script>

    </script>
@endsection
