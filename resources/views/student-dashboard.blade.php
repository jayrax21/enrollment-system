@extends('layouts.app')
@section('title')
@php
    $name = Auth::guard('student')->user()->fname." ".Auth::guard('student')->user()->lname;
    echo ucwords($name);
@endphp
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col col-md-8">
           <div class="row mb-1">
               <div class="col text-right">
               </div>
           </div>
            <div class="card mt-5">
                <div class="card-header text-center">
                  Available Subjects
                </div>
                <div class="card-body">
                    @if(session('succ'))
                        <div class="row">
                            <div class="col">
                                <div class="alert-success alert text-center">
                                    {{ session('succ') }}
                                </div>
                            </div>
                        </div>
                    @endif
                <form action="{{ route('add-enrolle') }}" id="form_id" method='post'>
                    @csrf
                    <table class="table table-striped table-bordered table-hover" id="subject_table">
                        <thead>
                          <tr class='text-center'>
                            <th scope="col">#</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Subject Code</th>
                            <th scope="col">Description</th>
                            <th scope="col">Schedule</th>
                            <th scope="col">Units</th>
                            <th scope="col">Room</th>
                            <th scope="col">Subject Teacher</th>
                            <th scope="col">Choose</th>
                          </tr>
                        </thead>
                            <tbody>
                                @php $counter = 1; @endphp
                                @if(count($subjects) > 0)
                                    @foreach($subjects as $subject)
                                        <tr class='text-center'>
                                            <td> {{ $counter++ }} </td>
                                            <td> {{ $subject->subject_name }} </td>
                                            <td> {{ $subject->subject_code }} </td>
                                            <td> {{ $subject->description }} </td>
                                            <td> {{ $subject->schedules->day_start }} </td>
                                            <td> {{ $subject->unit }} </td>
                                            <td> {{ $subject->rooms->room }} </td>
                                            <td> {{ ucwords($subject->teachers->fname." ".$subject->teachers->lname) }} </td>
                                            <td> 
                                                 <input type="checkbox" name="subject_id[]" class='subject_picked' value="{{ $subject->id }}" id="{{ $subject->id }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr class='text-center'>
                                    <td colspan='8'>No subjects added</td>
                                </tr>
                                @endif
                            </tbody>
                            <input type="hidden" name="student_id" value={{ Auth::guard('student')->user()->id }} class="form-control">
                      </table>
                      <div class="row">
                          <div class="col text-right">
                          </div>    
                      </div>
                </div>
                <div class="card-footer text-muted text-center">
                  Saint Michael's College © @php echo date("Y") @endphp
                </div>
              </div>
        </div>
        <div class="col col-md-3">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Subject Choosed
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class='text-center'>
                                        <th>Subject</th>
                                        <th>Unit</th>
                                    </tr>
                                </thead>
                                <tbody id="display_subj">
                                    <tr id="no_display" class='text-center'>
                                        <td colspan='2'>No subject picked yet</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col text-left ml-2">
                                    <b> <u>Total Unit: <span id="total"></span></u></b>
                                </div>
                                <div class="col"></div>
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-success btn0-sm">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#subject_table').DataTable();
        $('#hr').hide();
        let total_units = 0;
        let data_units = 0;
        $('.subject_picked').on('change',function(){
            let id = $(this).attr('id');
            if(total_units <= 28){
                if(this.checked){
                    $.ajax({
                        url:"{{ route('load_subject') }}",
                        method:'get',
                        data:{id:id},
                        success:function(data)
                            {
                                $('#display_subj').append("<tr class='text-center' id='subject_picked"+data['id']+ "'><td>"+data['subject_name']+"</td><td>"+data['unit']+"</td></tr>");
                                total_units += parseFloat(data['unit']);
                                data_units = data['unit'];
                                console.log(total_units);
                                $('#total').html(total_units);
                                $('#no_display').hide();
                            },
                            error:function(err)
                            {
                                console.log(err);
                            }
                        })
                        return data_units;
                    }
                else
                    {
                        $('#subject_picked'+id).remove();
                        total_units -= parseFloat(data_units);
                        console.log(total_units);
                        $('#total').html(total_units);
                        $('#no_display').show();
                    }
            }
            else{
                alert('Too much unit');
                location.reload();
            }
        })
    })
</script>
@endsection