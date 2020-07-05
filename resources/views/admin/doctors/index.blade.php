@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-4">

                @if (empty($specialities))
                   Reminder: You cannot add new doctor if you don't have specialities in your database, please run a seeder or add one <a href="">Here</a>
                @endif
                
                <form action="{{route('doctors.store')}}" method="POST">
                @csrf
                <input type="text" class="form-control" name="name" placeholder="name">
                <input type="text" class="form-control" name="surname" placeholder="Surname">
                <input type="email" class="form-control" name="email" placeholder="email">
                <select class="form-control" name="speciality" id="speciality">
                       @forelse ($specialities as $speciality)
                       <option selected value="{{$speciality->name}}">{{$speciality->name}}</option>
                       @empty
                       <option  disabled value=""> We don't have any specialities created.</option>
                          
                       @endforelse
                </select>
                <select class="form-control" name="hospital" id="hospital">
                    @forelse ($userHospitals as $hospital)
                <option value="{{$hospital->uuid}}">{{$hospital->name}}</option>
                    @empty
                    <option  disabled value=""> We don't have any hospitals created.</option>

                    @endforelse
                </select>
                <button class="btn btn-primary float-right ">Invite & Save</button>
            </form></>
            <div class="col-4"></div>
            <div class="col-4"></div>
        </div>
    </div>
@endsection