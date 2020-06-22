<!-- Modal -->
<div class="modal fade" id="edit{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Subject</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <form action="{{ route('edit-subject',$subject->id) }}" method="post">
            @csrf 
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Subject Name</label>
                        <input type="text" name="subject_name" class="form-control" value="{{ $subject->subject_name }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Subject Code</label>
                            <input type="text" name="subject_code" class="form-control" value="{{ $subject->subject_code }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Subject Description</label>
                            <input type="text" name="description" class="form-control" value="{{ $subject->description }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Schedule</label>
                            <select name="schedule_id" id="" class='form-control'>
                                @if(count($schedules) > 0)
                                    @foreach($schedules as $schedule)
                                    <option value="{{ $schedule->id }}" <?php echo $schedule->id === $subject->schedules->id ? 'selected' : '' ?>>{{ $schedule->day_start."-".$schedule->day_end." ".date("H:i A",strtotime($schedule->time_in))." - ".date("H:i A",strtotime($schedule->time_out)) }}</option>
                                    @endforeach
                                @else
                                    <option value="">No schedule input</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Room</label>
                            <select name="room_id" id="" class="form-control">
                                @if(count($rooms) > 0)
                                    @foreach($rooms as $room)
                                 <option value="{{ $room->id }}">{{ $room->room }}</option>
                                    @endforeach
                                @else
                                    <option value="">No room input</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label for="">Teacher</label>
                            <select name="teacher_id" class='form-control' id="">
                                @if(count($teachers) > 0)
                                    @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ ucwords($teacher->fname." ".$teacher->lname) }}</option>
                                    @endforeach
                                @else
                                    <option value="">No teacher input</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Subject</button>
            </div>
        </form>
      </div>
    </div>
  </div>