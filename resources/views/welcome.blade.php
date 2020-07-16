@extends('layouts.app')
@section('title')
Welcome to Saint Michael's College
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col col-sm-6 mt-5">
            <div class="card h-200">
                <div class="card-header text-center">
                    Welcome to Saint Michael's College
                </div>
                <div class="card-body text-center p-5">
                    <div class="row">
                        <div class="col">
                           <a href="{{ route('student-login') }}">
                                <button class="btn-primary btn">I am a Student</button>
                            </a>
                            <a href="{{ route('admin-login') }}">
                                <button class="btn-success btn">I am the Admin</button>
                            </a>
                            
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    Saint Michael's Colelge @php echo date("Y") @endphp 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection