@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
        </div>
        <div class="col-4">
            <form action="{{ route('admin.hospital.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="hospital_name">Hospital name:</label>
                <input type="text" name="hospital_name" class="form-control" id="hospital_name" placeholder="Hospital Name">
                <label for="hospital_serial">Hospital serial number (8):</label>
                <input type="number" name="hospital_serial" class="form-control"  id="hospital_serial" placeholder="Hospital Serial Number">
                <label for="hospital_image">Image:</label>
                <input type="file" name="hospital_image" class="form-control" > <br>
                <button class="btn btn-primary float-right">Create</button>
        
            </form>        

        </div>
        
@endsection