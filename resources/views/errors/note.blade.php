@if(Session::has('error'))
<h3><p class="alert alert-danger text-center">{{Session::get('error')}}</p></h3>
@endif

@if(Session::has('success'))
<h3><p class="alert alert-success text-center">{{Session::get('success')}}</p></h3>
@endif

@foreach($errors->all() as $error)
    <h3><p class="alert alert-danger text-center">{{$error}}</p></h3>
@endforeach
