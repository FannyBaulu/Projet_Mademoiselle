@extends('layouts.header')

@section('content')

<h2 class='text-center' style='margin-top:5%'>Welcome,{{Auth::user()->name}}!</h2>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3 class="text-center">To order on our website, please fill those informations, thank you.</h3>
<form action="{{route('users.accountManagement')}}" method="POST" style="width:50%; margin:auto; margin-top:5%" enctype="multipart/form-data">
    @csrf
    <div class= "form-group">
    <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{Auth::user()->first_name}}">
    </div>
    <div class= "form-group">
    <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{Auth::user()->last_name}}">
    </div>
    <div class= "form-group">
    <input type="text" class="form-control" placeholder="Address" name="address" value="{{Auth::user()->address}}">
    </div>
    <div class= "form-group">
        <input type="text" class="form-control" placeholder="Zip Code" name="codezip" value="{{Auth::user()->codezip}}">
    </div>
    <div class= "form-group">
    <input type="text" class="form-control" placeholder="City" name="city" value="{{Auth::user()->city }}">
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

@endsection