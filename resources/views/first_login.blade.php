@extends('layouts.app')

@section('content')
    




<div class="container">
    <div class="row">
        
        <div class="col-4">



        </div>
        <div class="col-4">
            Thank you for accepting our invitation, please fill your password below, this will be password for your login.
            <br>
            <br>
            <form action="{{route('password.create')}}" method="POST">
                @csrf
            <input type="hidden" name="doctor_token" value="{{$doctor->token}}">
                <label for="email">Email:</label>
            <input class="form-control" disabled value="{{$doctor->email}}">
                    <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                <input type="checkbox" onclick="togglePasswordVisibility()">Show Password
                <button class="btn btn-primary float-right">Save</button>
            </form>

        </div>
        <div class="col-4"></div>
    </div>
</div>
<script>

function togglePasswordVisibility() {
    let pwInput = document.getElementById("password");
  if (pwInput.type === "password") {
    pwInput.type = "text";
  } else {
    pwInput.type = "password";
  }
}
</script>
@endsection