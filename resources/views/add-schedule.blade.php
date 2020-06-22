@extends('layouts.app')
@section('title')
Schedule
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
                        <button class="btn-warning btn">
                            Enrollees
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
            <div class="card">
                <div class="card-header text-center">
                    Schedule
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="row mb-1">
                                <div class="col text-right">
                                    <button class="btn-success btn" data-toggle="modal" data-target="#add_schedule" type="button">Add Schedule</button>
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
                                  <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Day In</th>
                                    <th scope="col">Day Out</th>
                                    <th scope="col">Time in</th>
                                    <th scope="col">Time Out</th>
                                    <th>Total Hour</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @if(count($schedules) > 0)
                                    @php $counter = 1; @endphp
                                       @foreach($schedules as $schedule)
                                         <tr class='text-center'>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $schedule->day_start }}</td>
                                            <td>{{ $schedule->day_end }}</td>
                                            <td>
                                                @php 
                                                    $time_h = date("H",strtotime($schedule->time_in));
                                                    $time_in = date("H: i A",strtotime($schedule->time_in));
                                                    if($time_h > 12)
                                                    {
                                                        $hours = 24;
                                                        echo $hours - $time_h.": ".date("i",strtotime($schedule->time_in))."PM";
                                                    }
                                                    else
                                                    {
                                                        echo $time_in;
                                                    }
                                                @endphp
                                            </td>
                                            <td>
                                                @php 
                                                $time_h_h = date("H",strtotime($schedule->time_out));
                                                $time_out = date("H: i A",strtotime($schedule->time_out));
                                                if($time_h_h > 12)
                                                {
                                                    $hourss = 24;
                                                    echo $hourss - $time_h_h.": ".date("i",strtotime($schedule->time_out))."PM";
                                                }
                                                else
                                                {
                                                    echo $time_out;
                                                }
                                            @endphp
                                            </td>
                                            <td>
                                                @php
                                                        $total =  date("H",strtotime($schedule->time_out)) - date("H",strtotime($schedule->time_in));
                                                        echo $total === 1 ? $total.' Hour' : $total.' Hours';
                                                @endphp
                                            </td>
                                            <td>
                                           <button class="btn-warning btn-md btn" data-toggle="modal" data-target="#schedule{{ $schedule->id }}" type="button">Edit</button>
                                            <button class="btn-danger btn-md btn" data-toggle="modal" data-target="#delete{{ $schedule->id }}" type="button">Delete</button>
                                            </td>
                                        </tr>
                                        @include('edit-schedule-modal')
                                        @include('delete-schedule-modal')
                                       @endforeach
                                    @else
                                    <tr>
                                        <td colspan='7'>No added schedule.</td>
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
@include('add-schedule-modal')
@endsection