{{-- 
   @File Name   	: resources/views/register.blade.php
   @Created date	: 17/12/2021
   @Created By		: Pavan Kumar M
--}}
@extends('layouts.auth')

@section('content')
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
       <a href="{{ route('user.index') }}" class="h1"><b>Laravel</b> Accounts</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new account</p>

      <form action="{{ route('user.store') }}" method="post">
         @method('POST')
         @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name" value="{{ old('name') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
         
        </div>
        @error('name')
            <div class="alert alert-danger mt-2" > 
               {{ $message }}
            </div>
         @enderror
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div> 
        </div>
         @error('email')
            <div class="alert alert-danger mt-2" > 
               {{ $message }}
            </div>
         @enderror
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		@error('password')
            <div class="alert alert-danger mt-2" > 
               {{ $message }}
            </div>
         @enderror
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation"  class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('user.index') }}" class="text-center">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection
