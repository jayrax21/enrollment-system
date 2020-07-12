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
                    Declined Enrollees
                </div>
                <div class="card-body">
                    @if(session('suc'))
                        <div class="row">
                            <div class="col">
                                <div class="alert-success alert text-center">
                                    {{ session('suc') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                 <a href="{{ route('enroll_list') }}">
                                        <button class="btn-success btn active" id="offcially_enrolled">Officially Enrolled</button>
                                    </a>
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
                                    <button class="btn-danger btn">Declined</button>
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
                                        <th scope="col">Remarks</th>
                                      </tr>
                                    </thead>
                                        <tbody>
                                            @php $counter = 1; @endphp
                                            @if(count($declines) > 0 )
                                                @foreach($declines as $decline)
                                                  <tr class='text-center'>
                                                    <td>{{ $counter++ }}</td>
                                                    <td>
                                                        @php
                                                            $student = App\Student::where('id',$decline->enrolls->student_id)->first();
                                                        @endphp
                                                        {{ ucwords($student->fname." ".$student->lname) }}
                                                    </td>
                                                    <td>
                                                        {{ $student->course }}
                                                    </td>
                                                    <td>
                                                       @php
                                                           $subjects = explode(",",$decline->enrolls->subject_id);
                                                       @endphp
                                                       @foreach($subjects as $subject_id)
                                                            @php
                                                                $subjects = App\Subject::where('id',$subject_id)->first();
                                                            @endphp
                                                            {{ $subjects->subject_name."," }}
                                                       @endforeach
                                                    </td>
                                                    <td>
                                                        {{$decline->remarks}}
                                                    </td>
                                                  </tr>
                                                @endforeach
                                            @else
                                            <tr class='text-center'>
                                                <td colspan='5'>No Declined Enrollees</td>
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