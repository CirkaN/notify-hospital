

@forelse ($hospital->doctors as $doctor)
    <h4>{{$doctor->full_name}}</h4>
    <form method="POST" action="{{route("admin.doctor.destroy",$doctor->id)}}">
        @csrf 
        @method('DELETE')
            <button class="btn btn-danger">Delete this doctor</button>
    </form>
@empty
There are no doctors assigned to the hospital, please create one.

    
@endforelse