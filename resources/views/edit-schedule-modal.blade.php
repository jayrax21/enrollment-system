<!-- Modal -->
<div class="modal fade" id="schedule{{ $schedule->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Schedule</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('edit-sched',$schedule->id) }}" method="post">
            @csrf 
            <div class="modal-body">
            <input type="hidden" value="{{ $schedule->id }}">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Day In</label>
                            <select name="day_start" id="" class="form-control">
                                <option value="">Select Day</option>
                                <option value="Monday" <?php echo $schedule->day_start === 'Monday' ? 'selected' : '' ?> >Monday</option>
                                <option value="Tuesday" <?php echo $schedule->day_start === 'Tuesday' ? 'selected' : '' ?>>Tuesday</option>
                                <option value="Wednesday" <?php echo $schedule->day_start === 'Wednesday' ? 'selected' : '' ?>>Wednesday</option>
                                <option value="Thursday" <?php echo $schedule->day_start === 'Thursday' ? 'selected' : '' ?>>Thursday</option>
                                <option value="Friday" <?php echo $schedule->day_start === 'Friday' ? 'selected' : '' ?>>Friday</option>
                                <option value="Saturday" <?php echo $schedule->day_start === 'Saturday' ? 'selected' : '' ?>>Saturday</option>
                                <option value="Sunday" <?php echo $schedule->day_start === 'Sunday' ? 'selected' : '' ?>>Sunday</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Day Out</label>
                            <select name="day_end" id="" class="form-control">
                                <option value="">Select Day</option>
                                <option value="No Dayout" <?php echo $schedule->day_end === 'Monday' ? 'selected' : '' ?>>No Dayout</option>
                                <option value="Monday" <?php echo $schedule->day_end === 'Monday' ? 'selected' : '' ?>>Monday</option>
                                <option value="Tuesday" <?php echo $schedule->day_end === 'Tuesday' ? 'selected' : '' ?>>Tuesday</option>
                                <option value="Wednesday" <?php echo $schedule->day_end === 'Wednesday' ? 'selected' : '' ?>>Wednesday</option>
                                <option value="Thursday" <?php echo $schedule->day_end === 'Thursday' ? 'selected' : '' ?>>Thursday</option>
                                <option value="Friday" <?php echo $schedule->day_end === 'Friday' ? 'selected' : '' ?>>Friday</option>
                                <option value="Saturday" <?php echo $schedule->day_end === 'Saturday' ? 'selected' : '' ?>>Saturday</option>
                                <option value="Sunday" <?php echo $schedule->day_end === 'Sunday' ? 'selected' : '' ?>>Sunday</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Time in</label>
                            <input type="time" name="time_in" class="form-control" value={{ $schedule->time_in }}>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Time Out</label>
                            <input type="time" name="time_out" class="form-control" value={{ $schedule->time_out }}  >
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>