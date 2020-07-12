@extends('layouts.app')
@section('admin-dashboard-css')
<link rel="stylesheet" href="/css/admin-dashboard.css">
@endsection
@section('title')
Dashboard
@endsection
@section('content')
<div class="container-fluid">
    <div id='content'>
    <div class="row justify-content-center mt-5">
        <div class="col col-md-10">
           <div class="row mb-1">
               <div class="col text-right">
                    <a href="{{ route('subject') }}">
                        <button class="btn-primary btn">
                                Subjects
                        </button>
                    </a>
                    <a href="{{ route('schedule') }}">
                        <button class="btn-info btn">
                            Schedules
                        </button>
                    </a>
                    <a href="{{ route('room') }}">
                        <button class="btn-success btn">
                            Room
                         </button>
                    </a>
                    <a href="{{ route('teacher') }}">
                        <button class="btn-secondary btn">
                            Teacher
                        </button>
                    </a>
                    <a class="btn btn-warning" href="{{ route('enroll_list') }}" >
                        Enrollee
                    </a>
                   <a class="btn btn-warning" href="{{ route('enroll_list') }}" role="button" id="enrolee_dpdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Notification 
                              @if( Auth::guard('admin')->user()->unreadNotifications->count())
                                <span class="badge badge-danger">
                                    {{ Auth::guard('admin')->user()->unreadNotifications->count() }} 
                                </span>
                              @endif
                    </a>
                        <div class="dropdown-menu" aria-labelledby="enrolee_dpdown">
                            @if(Auth::guard('admin')->user()->unreadNotifications->count() > 0)
                                @foreach(Auth::guard('admin')->user()->unReadNotifications as $notification)
                                     <a href="{{ route('new-enrollee',$notification->data['student_id']) }}" class='dropdown-item'><u>{!! $notification->data['student_name']." has request for enrollment.</u><small>".$notification->created_at->diffForHumans()."</small>" !!}</a>
                                @endforeach
                            @else
                                <a href="" class='dropdown-item'>No enrollees at the moment.</a>
                            @endif
                        </div>
                    <a href="{{ route('admin-logout') }}">
                        <button class="btn-danger btn">
                            Logout
                        </button>
                    </a>
               </div>
           </div>
            <div class="card ">
                <div class="card-header text-center">
                  Enrollee Lists
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                   <button class="btn-success btn active" id="offcially_enrolled">Officially Enrolled</button>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                   <a href="{{ route('pending') }}">
                                        <button class="btn-info btn" id="pending">
                                            Pending Requests
                                            @if(Auth::guard('admin')->user()->unreadNotifications->count() > 0)
                                                <span class="badge badge-danger">{{Auth::guard('admin')->user()->unreadNotifications->count()}}</span>
                                            @endif
                                        </button>
                                    </a>
                                 </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                 <a href="{{ route('decline') }}">
                                        <button class="btn-danger btn">Declined</button>
                                    </a>
                                 </div>
                            </div>
                        </div>
                        <div class="col col-md-10">
                            <div class="">
                                <table class="table table-striped table-bordered table-hover" id="subject_table">
                                    <thead>
                                      <tr class='text-center'>
                                        <th scope="col">#</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Subject Picks</th>
                                      </tr>
                                    </thead>
                                        <tbody  id="data_enroll">
                                            @php $counter = 1; @endphp
                                            @if(count($confirms) > 0)
                                                @foreach($confirms as $confirm)
                                                     @php
                                                            $students = App\Student::where('id',$confirm->enrolls->student_id)->get();
                                                    @endphp
                                                    @foreach($students as $student)
                                                    <tr class='text-center'>
                                                        <td>{{ $counter }}</td>
                                                        <td>{{ $student->fname." ".$student->lname }}</td>
                                                        <td>{{ $student->course }}</td>
                                                        <td>
                                                            @php
                                                                $subjects = explode(",",$confirm->enrolls->subject_id);
                                                            @endphp
                                                            @foreach($subjects as $subject)
                                                                @php
                                                                    $subject_names = App\Subject::where('id',$subject)->get();
                                                                @endphp
                                                                @foreach($subject_names as $subject_name)
                                                                        {{$subject_name->subject_name.","}}
                                                                @endforeach
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endforeach
                                            @else
                                            <tr class='text-center'>
                                                <td colspan='8'>No Students enrolled.</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                  2 days ago
                </div>
              </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
@endsection