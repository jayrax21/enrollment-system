@extends('layouts.app')
@section('title')
Assessment
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col col-md-8">
            <div class="col mb-2">
                <a href="{{ route('student-dashboard') }}">
                    <button class='btn btn-primary'>
                        Subject Lists
                    </button>
                </a>
                <a href="{{ route('assesment',Auth::guard('student')->user()->id) }}">
                    <button class="btn-primary btn">
                        Assessment
                    </button>
                </a>
                <a href="{{ route('profile', Auth::guard('student')->user()->id) }}">
                    <button class='btn btn-primary'>
                        <i class="fas fa-user"></i>
                    </button>
                </a>
                <button class='btn btn-primary' role="button" id="enrolee_dpdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    @if(Auth::guard('student')->user()->unreadNotifications->count())
                          <span class='badge badge-danger'>{{Auth::guard('student')->user()->notifications->count()}}</span>
                    @endif
                </button>
                <div class="dropdown-menu" aria-labelledby="enrolee_dpdown">
                    @if(Auth::guard('student')->user()->notifications->count() > 0)
                        @foreach(Auth::guard('student')->user()->notifications as $notification)
                       <a href="{{ route('assesment',Auth::guard('student')->user()->id)}}" class='dropdown-item'>{!! "Geetings <u>".$notification->data['student_name']."</u>. ".$notification->data['message'] !!}</a>
                        @endforeach
                    @else
                    <a href="" class='dropdown-item'>No notifications available.</a>
                    @endif
                </div>
                <a href="{{ route('student-logout') }}">
                    <button class="btn btn-danger">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </a>
            </div>
           <div class="row mb-1">
               <div class="col text-right">
               </div>
           </div>
            <div class="card">
                <div class="card-header text-center">
                  Your Assessment
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
                          </tr>
                        </thead>
                            <tbody>
                                @php $counter = 1; $endphp @endphp
                                @if(count($subjects) > 0 || !empty($subjects))
                                    @foreach($subjects as $subject)
                                        <tr class='text-center'>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $subject->subject_name }}</td>
                                            <td>{{ $subject->subject_name }}</td>
                                            <td>{{ $subject->subject_code }}</td>
                                            <td>{{ $subject->description }}</td>
                                            <td>{{ $subject->unit }}</td>
                                            <td>
                                                @php
                                                    $room = App\Room::where('id',$subject->room_id)->first();
                                                @endphp
                                                {{ $room->room }}
                                            </td>
                                            <td>
                                                @php
                                                    $teacher = App\Teacher::where('id',$subject->teacher_id)->first();
                                                @endphp
                                                {{ ucwords($teacher->fname." ".$teacher->lname) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan='8'>No data.</td>
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
    </div>
</div>
@endsection
@section('script')
<script>

</script>
@endsection