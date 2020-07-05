@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-4">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>                <p style="color:red;">{{$error}}</p>
                   </div>

            @endforeach
        @endif
            <img src="{{ asset('images/' . $hospital->image) }}" class="img-thumbnail" width="150" height="236"> 
<br>
            Hospital name: {{$hospital->name}} <br>
            Hospital serial number: {{$hospital->serialnum}} <br>
            Hospital owner: {{App\User::whereid($hospital->user_id)->first()->name}} <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Create a notification
              </button>

              @include('admin.hospital.includes.notificationmodal')
              
        </div>
        <div class="col-4">

            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#AllDoctors" aria-expanded="false" aria-controls="collapseExample">
                Show doctors
              </button>
            </p>
            <div class="collapse" id="AllDoctors">
              
@include('admin.hospital.doctors.all')
             
            </div></div>


        <div class="col-4">

            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#addDoctor" aria-expanded="false" aria-controls="collapseExample">
                Add doctor
              </button>
            </p>
            <div class="collapse" id="addDoctor">
              
            @include('admin.hospital.doctors.add')
             
            </div>
        </div>
    </div>
</div>
@endsection