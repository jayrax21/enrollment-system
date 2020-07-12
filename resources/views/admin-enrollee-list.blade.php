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
        <div class="col col-md-8">
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
                    <a class="btn btn-warning" href="#" role="button" id="enrolee_dpdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Enrollees 
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
           <div class="row justify-content-center mt-3">
               <div class="col">
                <div class="card">
                    <div class="card-header text-center">
                      Subjects
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                 <h4>Full Name: {{ ucwords($student->fname." ".$student->lname) }}</h4>
                                 <p>Address: <u>{{ ucwords($student->address)}}</u></p>
                                 <p>Contact: <u>{{ ucwords($student->contact)}}</u></p>
                                 <p>Gender: <u>{{ ucwords($student->gender)}}</u></p>
                                 <p>Birthday: <u>{{ ucwords(date("F j, Y",strtotime($student->address))) }}</u></p>
                                 <p>Course: <u>{{ ucwords($student->course)}}</u></p>
                            </div>
                            <div class="col">
                                <table class='table table-striped table-bordered table-hover text-center'>
                                    <thead>
                                        <thead>
                                            <th>Subject</th>
                                            <th>Unit</th>
                                        </thead>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subjects = explode(",",$subject);
                                            $total = 0;
                                        @endphp
                                        @if(count($subjects) > 0)
                                            @foreach($subjects as $subject_id)
                                                @php
                                                    $subject_name = App\Subject::where("id",$subject_id)->first();
                                                @endphp
                                                <tr>
                                                    <td>{{ $subject_name->subject_name}}</td>
                                                    <td>{{ $subject_name->unit}}</td>
                                                </tr>
                                                @php $total += floatval($subject_name->unit) @endphp
                                            @endforeach
                                        @else 
                                            <td colspan='2'>No Subject requested.</td>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col col-md-8"></div>
                                    <div class="col ml-5">
                                        <b>Total Subject Units: @php echo $total @endphp </b>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col"></div>
                                    <div class="col text-right">
                                            <button class="btn-danger btn" data-toggle="modal" data-target="#decline_action">Decline</button>
                                            <button class="btn-primary btn" data-toggle="modal" data-target="#corfirm_action">Confirm Request</button>
                                    </div>
                                </div>
                                @include('confirm-action')
                                @include('decline-action')
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
</div>
</div>
@endsection
@section('script')
<script>

</script>
@endsection