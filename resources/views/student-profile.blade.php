@extends('layouts.app')
@section('title')
   Your Profile
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col col-md-6">
            <div class="col mb-2">
            <a href="{{ route('student-dashboard') }}">
                <button class='btn btn-primary' title="Subjects">
                    Subject Lists
                </button>
            </a>
            <a href="{{ route('assesment',Auth::guard('student')->user()->id) }}">
                <button class="btn-primary btn">
                    Assessment
                </button>
            </a>
                <a href="{{ route('profile', Auth::guard('student')->user()->id) }}">
                    <button class='btn btn-primary'  title="Profile">
                        <i class="fas fa-user"></i>
                    </button>
                </a>
                <button class='btn btn-primary' role="button" id="enrolee_dpdown" title="Notifcations" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <a href="" class='dropdown-item'>No notification.</a>
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
                  Student Profile
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
                <form action="{{ route('update-profile',$student->id) }}" id="form_id" method='post'>
                    @csrf
                   <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="fname" value="{{$student->fname}}" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" value="{{$student->lname}}" class="form-control">
                            </div>
                        </div>
                   </div>
                   <div class="row">
                       <div class="col">
                           <div class="form-group">
                               <label for="">Address</label>
                               <input type="text" name="address" class="form-control" value="{{$student->address}}">
                           </div>
                       </div>
                   </div>
                   <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Contact</label>
                                <input type="text" name="contact" class="form-control" value="{{$student->contact}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Course</label>
                                <select name="course" id="" class="form-control">
                                    <option value="">Select Course</option>
                                    <option value="BSIT" <?php  echo $student->course === 'BSIT' ? 'selected' : '' ?>>BSIT</option>
                                    <option value="BSBA" <?php  echo $student->course === 'BSBA' ? 'selected' : '' ?>>BSBA</option>
                                    <option value="BS-Accountancy" <?php  echo $student->course === 'BS-Accountancy' ? 'selected' : '' ?>>BS-Accountancy</option>
                                    <option value="BS-Civil Engineering" <?php  echo $student->course === 'BS-Civil Engineering' ? 'selected' : '' ?>>BS-Civil Engineering</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Gender</label>
                                <select name="gender" id="" class="form-control">
                                    <option value=""></option>
                                    <option value="Male"  <?php  echo $student->gender === 'Male' ? 'selected' : '' ?>>Male</option>
                                    <option value="Female"  <?php  echo $student->gender === 'Female' ? 'selected' : '' ?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Birthdate</label>
                                <input type="date" name="bday" class="form-control" value="{{ $student->bday }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ $student->username }}">
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">ID Number</label>
                                <input type="text" name="id_number" class="form-control" value="{{ $student->id_number }}">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col">

                        </div>
                        <div class="col col-md-3 text-right">
                            <button class="btn-info btn btn-block">Update</button>
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