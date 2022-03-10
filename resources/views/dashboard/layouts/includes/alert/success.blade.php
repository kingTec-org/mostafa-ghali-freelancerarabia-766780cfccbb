@if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="alert alert-custom alert-default alert-success" role="alert">
        {{\Illuminate\Support\Facades\Session::get('success')}}
    </div>
@endif
