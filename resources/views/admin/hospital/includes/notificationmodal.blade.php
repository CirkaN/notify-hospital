<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Notifcations</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('admin.notification.store')}}" method="POST">
          @csrf
          <label for="content"><b>Notification Content:</b></label>
          <textarea class="content" name="content"></textarea>
          <label for="speciality"><b>Speciality:</b></label>
          <select class="form-control" name="target" id="speciality">
            
            @forelse ($specialities as $speciality)
          <option value="{{$speciality->name}}">{{$speciality->name}}</option>
            @empty
            <option selected>We don't have any speciality created.</option>

            @endforelse

          </select>
          <button class="btn btn-primary float-right">Save</button>
          <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
          <script>
              tinymce.init({
                  selector:'textarea.content',
                  width: 765,
                  height: 300
              });
          </script>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>