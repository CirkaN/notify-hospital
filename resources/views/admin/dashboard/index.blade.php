@extends('layouts.app')

@section('content')
@if(Auth::guard('admin')->check())
<div class="container">
    <div class="row">
    <div class="col-4">Hello {{Auth::guard('admin')->user()->name}}
        <a href="{{route("admin.hospital.index")}}">Create a hospital</a></div>
        <div class="col-4">
            @forelse ($hospitals as $hospital)
         <a href="/admin/dashboard/manage/{{$hospital->uuid}}"><h3>{{$hospital->name}}</h3></a>
        <form method="POST" action="{{route("admin.hospital.destroy",$hospital->id)}}">
        @csrf 
        @method('DELETE')
            <button class="btn btn-danger">Delete this hospital</button>
    </form>
        @empty
        Seems like you don't have any hospital, please <a href="{{route("admin.hospital.index")}}">create one</a>.

        @endforelse</div>
        <div class="col-4"></div>
    </div>
</div>
@else
<script>window.location = "/unauthorized";</script>

@endif


@endsection