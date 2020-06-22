@extends('layouts.app')

@section('title')
Admin Login
@endsection
@section('content')
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col col-md-7">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Admin Login
                </div>
                <form action="{{ route('admin-login') }}" method="post">
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
                                    <div class="alert alert-danger text-center">
                                    <small>{{ session('flash') }}</small>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(session('suc'))
                            <div class="row">
                                <div class="col">
                                    <div class="alert alert-info text-center">
                                    <small>{{ session('suc') }}</small>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col"></div>
                            <div class="col text-right col-md-3">
                                <button class="btn-success btn btn-block btn-sm" type='submit'>Login</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
@endsection