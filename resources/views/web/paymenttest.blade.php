@extends('web.layouts.master')
@section('content')

<div class="main_payment container mt-5 pt-5">
  <div class="row">
      <div class="left col-md-8 col-sm-12">
    <div class="top row pb-5">
        <div class="col-md-3 col-sm-12">
            <img src="{{asset('web_ar/img/default-avatar.jpg')}}" class="" width="100%" height="150px" alt="" />
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="title row pt-2">
           <div class="col-10">
            <h5>i will develop an android app or will be your </br> android app developer</h5>
           </div>
           <div class="col-2 text-left">
               <p>QTy <span>1</span> $100</p>
           </div>
        </div>
        <p class="str pt-2">
            <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
         <span class="fa fa-star"></span>
         <span class="px-2">5.0</span>(35 reviews)
        </p>
        <a href="#">view whats included</a>
        </div>
    </div>
     {{-- end top --}}
     <div class="down pt-5">
         <h2 class="py-3">Upgrade your order with extras</h2>
         <div class="row py-3">
             <div class="col-10 d-flex">
                 <input type="checkbox" >
                 <h5 class="px-2">Extra fast 1 day delevey</h5>
             </div>
             <div class="col-2">
                 <h5>$30</h5>
            </div>
         </div>
         <div class="row py-3">
            <div class="col-10 d-flex">
                <input type="checkbox" >
                <h5 class="px-2">Extra fast 1 day delevey</h5>
            </div>
            <div class="col-2">
                <h5>$30</h5>
           </div>
        </div>
        <div class="row py-3">
            <div class="col-10 d-flex">
                <input type="checkbox" >
                <h5 class="px-2">Extra fast 1 day delevey</h5>
            </div>
            <div class="col-2">
                <h5>$30</h5>
           </div>
        </div>
     </div>
    </div>
    {{-- end left --}}
    <div class="col-md-4 col-sm-12">
    </div>
    </div>
</div>
@endsection
