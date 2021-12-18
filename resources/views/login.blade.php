{{-- 
   @File Name   	: resources/views/login.blade.php
   @Created date	: 17/12/2021
   @Created By		: Pavan Kumar M
--}}
@extends('layouts.auth')

@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route('user.index') }}" class="h1"><b>Laravel</b> Accounts</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('user.login') }}" method="post">
         @method('POST')
         @csrf
        <div class="input-group mb-3">
          <input type="email"  name="email" class="form-control" placeholder="Email"  value="{{ old('email') }}">
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
          <input type="password"  name="password" class="form-control" placeholder="Password"  value="{{ old('password') }}">
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
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember_me">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-0">
        <a href="{{ route('user.create') }}" class="text-center">Register a new account</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection