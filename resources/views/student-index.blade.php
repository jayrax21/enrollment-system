@extends('layouts.app')

@section('title')
Welcome to Saint Michael's College
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col col-md-8">
            <div class="card mt-5">
                <div class="card-header text-center">
                  Featured
                </div>
              <form action="{{ route('student-login')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="">Username</label>
                              <input type="text" class="form-control" name="username">
                          </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                  </div>
                  @if(session('flash'))
                    <div class="row">
                      <div class="col">
                          <div class=" text-center alert-danger alert">
                            <small class=''> {{ session('flash') }} </small>
                          </div>
                      </div>
                    </div>
                  @endif
                  @if(session('succ'))
                  <div class="row">
                    <div class="col">
                        <div class=" text-center alert-info alert">
                          <small class=''> {{ session('succ') }} </small>
                        </div>
                    </div>
                  </div>
                @endif
                  <div class="row">
                      <div class="col">
                      <small>Not yet enrolled?<a href="{{ route('student-register') }}"> Signup Here</a></small>
                      </div>
                      <div class="col text-right col-md-3">
                          <button class="btn-primary btn btn-block btn-md" type="submit">Login</button>
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