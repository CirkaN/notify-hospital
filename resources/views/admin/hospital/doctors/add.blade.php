
              
                
                <form action="{{route('admin.doctor.store')}}" method="POST">
                @csrf
                <input type="hidden" name="hospital" value="{{$hospital->id}}">
                <input type="text" class="form-control" name="name" placeholder="name">
                <input type="text" class="form-control" name="surname" placeholder="Surname">
                <input type="email" class="form-control" name="email" placeholder="email">
                <select class="form-control" name="speciality" id="speciality">
                       @forelse ($specialities as $speciality)
                       @if ($speciality->name == 'Super Admin')

                       @else
                       <option selected value="{{$speciality->name}}">{{$speciality->name}}</option>

                       @endif
                       @empty
                       <option  disabled value=""> We don't have any specialities created.</option>
            
                       @endforelse
                </select>
                <button class="btn btn-primary float-right ">Invite & Save</button>
            </form>
