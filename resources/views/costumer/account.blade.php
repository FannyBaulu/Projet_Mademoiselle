@extends('./layouts/header')
@section('content')


<div class="d-flex flex-column align-items-center">
<h1 class="m-2">Hello {{$user->name}}</h1>

<div class="card d-flex align-items-center m-5" style="width:25%; border:1px solid rgb(249, 174, 100);">
    <img class="card-img-top p-5" src="{{asset('images/user.png')}}" alt="Card image cap" style="padding:2%;">
    <div class="card-body">
      <h3 class="card-title" style="color:rgb(249, 174, 100);">My profile</h3>
      <div class="card-text">
          <p><strong >First Name:</strong> {{$user->first_name ?? 'First name not provided'}}</p>
          <p><strong>Last Name:</strong> {{$user->last_name ?? 'Last name not provided'}}</p>
          <p><strong>Address :</strong> {{$user->address ? $user->address.',': 'Address not provided'}}{{$user->codezip ?$user->codezip.',': ''}}{{$user->city ?? ''}}</p>
      </div>
      <a href={{route('users.accountManagementView')}}>
        <button type="button" class="btn btn-primary">Edit</button>
    </a>
    </div>
  </div>
</div>
@endsection