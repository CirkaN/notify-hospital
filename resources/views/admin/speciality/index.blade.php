@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-4">
            List of all specialities.
            <br>
            <br>
            <hr>
            @forelse ($specialities as $speciality)
                @if ($speciality->name == "Super Admin")
                       @else
                       <h5>{{$speciality->name}}</h5>
                       <form method="POST" action="{{route("admin.speciality.destroy",$speciality->id)}}">
                           @csrf
                           @method('DELETE')
                       <button class="btn btn-danger">Delete {{$speciality->name}}</button>
                       </form>
                       <hr>
                @endif


            @empty
                We don't have any specialities at the moment
            @endforelse

        </div>
        <div class="col-4">

            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#addSpeciality" aria-expanded="false" aria-controls="collapseExample">
                Add Speciality
              </button>
            </p>
            <div class="collapse" id="addSpeciality">

            @include('admin.speciality.includes.add')

            </div>

        </div>
        <div class="col-4"></div>
    </div>
</div>

@endsection
