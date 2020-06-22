@extends('layouts.app')
@section('title')
Student Registration
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row justify-content-center mt-5">
                <div class="col col-md-9">
                    <div class="card mt-5">
                        <div class="card-header text-center">
                          Enrollment Form
                        </div>
                        <form action="{{ route('student-register-post')}}" method='post'>
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" class="form-control" name='fname'>
                                            @error('fname')
                                               <small class='text-danger'>  {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" class="form-control" name='lname'>
                                            @error('lname')
                                                <small class='text-danger'>  {{ $message }} </small>
                                             @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" name='address'>
                                            @error('address')
                                                <small class='text-danger'>  {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Contact</label>
                                            <input type="text" class="form-control" name='contact'>
                                            @error('contact')
                                                <small class='text-danger'>  {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Birthday</label>
                                            <input type="date" class="form-control" name='bday'>
                                            @error('bday')
                                                <small class='text-danger'>  {{ $message }} </small>
                                             @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <select name="gender" id="" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            @error('gender')
                                                <small class='text-danger'>  {{ $message }} </small>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Course</label>
                                            <select name="course" id="" class="form-control">
                                                <option value="">Select Course</option>
                                                <option value="Male">BSIT</option>
                                                <option value="Female">BSBA</option>
                                                <option value="Female">BS-Accountancy</option>
                                                <option value="Female">BS-Civil Engineering</option>
                                            </select>
                                            @error('course')
                                                <small class='text-danger'>  {{ $message }} </small>
                                             @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" class="form-control" name='username'>
                                            @error('username')
                                                <small class='text-danger'>  {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" name='password'>
                                            @error('password')
                                                <small class='text-danger'>  {{ $message }} </small>
                                             @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <label for="">Student ID Number</label>
                                            <input type="text" class="form-control" name='id_number'>
                                            @error('id_number')
                                                <small class='text-danger'>  {{ $message }} </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col col-md-1"></div>
                                    <div class="col col-md-5 mt-4 text-right">
                                        <button class="btn-primary btn mt-2 btn-block" type='submit'>Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer text-center">
                          2 days ago
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection