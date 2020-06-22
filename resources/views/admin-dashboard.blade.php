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
                    <a href="{{ route('admin-logout') }}">
                        <button class="btn-danger btn">
                            Logout
                        </button>
                    </a>
               </div>
           </div>
            <div class="card ">
                <div class="card-header text-center">
                  Subjects
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row mb-1">
                                <div class="col text-right">
                                    <button class="btn-primary btn" data-toggle="modal" data-target="#exampleModal" type="button">Add Subject</button>
                                </div>
                            </div>
                            @if(session('succ'))
                                <div class="row">
                                    <div class="col">
                                        <div class="text-center alert alert-success">
                                                {{ session('succ') }}
                                        </div>
                                    </div>
                                </div>
                             @endif
                             @if(session('fail'))
                             <div class="row">
                                 <div class="col">
                                     <div class="text-center alert alert-danger">
                                             {{ session('fail') }}
                                     </div>
                                 </div>
                             </div>
                            @endif
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                  <tr class='text-center'>
                                    <th scope="col">#</th>
                                    <th scope="col">Subject Name</th>
                                    <th scope="col">Subject Code</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Schedule</th>
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
                                                <td>{{ $counter++ }}</td>
                                                <td>{{ $subject->subject_name }}</td>
                                                <td>{{ $subject->subject_code }}</td>
                                                <td>{{ $subject->description }}</td>
                                                <td>
                                                    {{ $subject->schedules->day_start." to ".$subject->schedules->day_end }} 
                                                    {{ "(".date("H:i A",strtotime($subject->schedules->time_in))." to ".date("H:i A",strtotime($subject->schedules->time_out)).")   " }}
                                                </td>
                                                <td>{{ $subject->rooms->room }}</td>
                                                <td>{{ ucwords($subject->teachers->fname." ".$subject->teachers->lname) }}</td>
                                                <td>
                                                <button class="btn-warning btn" data-toggle="modal" data-target="#edit{{$subject->id}}" type="button">Edit</button>
                                                    <button class="btn-danger btn" data-toggle="modal" data-target="#delete{{$subject->id}}" type="button">Delete</button>
                                                </td>
                                            </tr>
                                            @include('subject-edit-modal')
                                            @include('subject-delete-modal')
                                        @endforeach
                                    @else
                                    <tr class='text-center'>
                                        <td colspan='8'>No subjects added</td>
                                    </tr>
                                    @endif
                                </tbody>
                              </table>
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
@include('add-subject-modal')
@endsection
@section('script')
<script type='text/javascript' src='{{ asset('js/admin.js') }}'></script>
@endsection