                                <!-- Modal -->
                                <div class="modal fade" id="corfirm_action" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirm Action</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                    <form action="{{ route('confirm') }}" method="post">
                                          @csrf
                                        <div class="modal-body">
                                            <input type="hidden" id="enroll_id" name="enroll_id" value="{{$enrollees->id}}" class="form-control">
                                            Are you sure you want to confirm this request?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                        </div>
                                     </form>
                                    </div>
                                    </div>
                                </div>