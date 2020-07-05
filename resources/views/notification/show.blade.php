

@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">Welcome to your notifications manager, from here you can see all your notifications, for your speciality</div>
        <div class="col-4">
            @forelse ($doctor->notifications as $notification)

        <button class="btn btn-{{($notification->read_at ? 'success' :'danger')}}" type="button" data-toggle="collapse" data-target="#notificationCollapse--{{$notification->id}}" aria-expanded="false" aria-controls="collapseExample">
            {{($notification->read_at ? 'Old Notification' :'New Notification')}}
                  </button><br>
                <div class="collapse" id="notificationCollapse--{{$notification->id}}">
                    <div class="card card-body">
{!!$notification->data['content']!!}
@if ($notification->read_at)
    Seen at: {{$notification->read_at}}
@endif

                    <form action="{{route('notification.seen',['id'=> $notification->id])}}" method="POST">
                        @csrf
                        <button class="btn btn-primary float-right" {{($notification->read_at ? 'disabled' :'active')}}>Mark as seen</button>
                </form>
</div>
                  </div>
                  @empty
                  There are no notifications

            @endforelse

        </div>
        <div class="col-4"></div>
    </div>
</div>
@endsection
