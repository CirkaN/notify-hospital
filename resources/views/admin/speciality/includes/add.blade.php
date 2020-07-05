<form action="{{route('admin.speciality.store')}}" method="POST">
    @csrf
    <input type="text" class="form-control" name="name" placeholder="Speciality name">
    <br>
    <button class="btn btn-primary float-right">Save me</button>
</form>
