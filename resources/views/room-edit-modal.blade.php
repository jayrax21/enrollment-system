<!-- Modal -->
<div class="modal fade" id="edit_room{{ $room->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('edit-room',$room->id) }}" method="post">
            @csrf 
            <div class="modal-body">
               <div class="row">
                   <div class="col">
                       <div class="form-group">
                           <label for="">Room Name</label>
                       <input type="text" class="form-control" name="room" value="{{ $room->room }}">
                       </div>
                   </div>
               </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Edit</button>
            </div>
        </form>
      </div>
    </div>
  </div>