@extends('layouts.app')
@section('title')
Teacher
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col col-md-9">
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
            @if($errors->any() > 0)
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card ">
                <div class="card-header text-center">
                    Teacher
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row mb-1">
                                <div class="col text-right">
                                    <button class="btn-success btn" data-toggle="modal" data-target="#add_teacher" type="button">Add Teacher</button>
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
                            @if(session('edit'))
                                <div class="row">
                                    <div class="col">
                                        <div class="text-center alert alert-success">
                                                {{ session('edit') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(session('del'))
                                <div class="row">
                                    <div class="col">
                                        <div class="text-center alert alert-danger">
                                                {{ session('del') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                  <tr class='text-center'>
                                    <th scope="col">No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                     @if(count($teachers) > 0)
                                     @php $counter = 1; @endphp
                                         @foreach($teachers as $teacher)
                                         <tr class='text-center'>
                                             <td width="15%">{{ $counter++ }}</td>
                                             <td width="50%">{{ ucwords($teacher->fname." ".$teacher->lname) }}</td>
                                             <td>{{ $teacher->contact }}</td>
                                             <td width="15%">
                                                 <button class="btn-warning btn" data-toggle="modal" data-target="#edit_teacher{{ $teacher->id }}" type="button">Edit</button>
                                                 <button class="btn-danger btn" data-toggle="modal" data-target="#delete_teacher{{ $teacher->id }}" type="button">Delete</button>
                                             </td>
                                         </tr>
                                         @include('teacher-edit-modal')
                                         @include('teacher-delete-modal')
                                         @endforeach
                                     @else
                                     <tr class='text-center'>
                                         <td colspan='4'>No Teacher added.</td>
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
@include('teacher-add-modal')
@endsection