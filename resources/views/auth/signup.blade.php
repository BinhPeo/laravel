@extends('layout.client')
@section('title')
{{$title}}
@endsection
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
<div class="container">
  <div class="register-form">
    <h2>Đăng ký</h2>
   
        @csrf
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="name" class="form-label">Họ và tên</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên">
          @error('name')
           <small>{{$message('name đã được đăng kí')}}</small>   
          @enderror
        </div>
        <div class="col-md-6 mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
        </div>
        @error('email')
        <small>{{$message}}</small>   
       @enderror
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="password" class="form-label">Mật khẩu</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
          @error('password')
          <small>{{$message}}</small>   
         @enderror
        </div>
        <div class="col-md-6 mb-3">
          <label for="confirm-password" class="form-label">Xác nhận mật khẩu</label>
          <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Xác nhận mật khẩu">
          @error('confirm_password')
          <small>{{$message}}</small>   
         @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="role" class="form-label">Ảnh đại diện</label>
          <input type="file" name="image">
          {{-- <select class="form-select" id="role" name="role">
            <option value="user">0</option>
            <option value="admin">1</option>
          </select> --}}
        </div>
        <div class="col-md-6 mb-3">
          <label  class="form-label">Nhập số điện thoại</label>
          <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại">
          @error('phone')
          <small>{{$message}}</small>   
         @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mb-3">
          <button type="submit" class="btn btn-primary">Đăng ký</button>
        </div>
      </div>
      <div class="login-link">
        <p>Bạn đã có tài khoản? <a href="#">Đăng nhập</a></p>
      </div>

  </div>
</div>
</form>
@endsection