@extends('layout.client')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="container">
    <div class="login-form">
      <h2>Đăng nhập</h2>
      <form action="" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
          @error('email')
          <small>{{$message}}</small>   
         @enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mật khẩu</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
          @error('password')
          <small>{{$message}}</small>   
         @enderror
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="remember">
          <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
        </div>
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
        <div class="forgot-link">
          <a href="#">Quên mật khẩu?</a>
        </div>
        <div class="login-link">
          <p>Bạn đã có tài khoản? <a href="#">Đăng kí</a></p>
        </div>
      </form>
    </div>
  </div>
  @endsection