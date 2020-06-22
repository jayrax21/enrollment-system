@extends('layouts.app')
@section('title')
Rooms
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col col-md-9">
            <div class="row mb-2">
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
                    Room
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row mb-1">
                                <div class="col text-right">
                                    <button class="btn-success btn" data-toggle="modal" data-target="#add_room" type="button">Add Room</button>
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
                                    <th scope="col">Room Name</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                     @if(count($rooms) > 0)
                                     @php $counter = 1; @endphp
                                         @foreach($rooms as $room)
                                         <tr class='text-center'>
                                             <td width="15%">{{ $counter++ }}</td>
                                             <td width="50%">{{$room->room}}</td>
                                             <td width="15%">
                                                 <button class="btn-warning btn" data-toggle="modal" data-target="#edit_room{{ $room->id }}" type="button">Edit</button>
                                                 <button class="btn-danger btn" data-toggle="modal" data-target="#delete_room{{ $room->id }}" type="button">Delete</button>
                                             </td>
                                         </tr>
                                         @include('room-edit-modal')
                                         @include('room-delete-modal')
                                         @endforeach
                                     @else
                                     <tr>
                                         <td colspan='3'>No Room added.</td>
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
@include('room-add-modal')
@endsection