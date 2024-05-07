@extends('layout.admin')
@section('title')
    {{$title}}
@endsection
@section('content')
<section class="wrapper">
    <div class="typo-agile">
        <h2 class="w3ls_head">CẬP NHẬP SẢN PHẨM</h2>
        <div class="row">
            <!-- form -->
            <form action="{{route('admin.san-pham.update',$sanpham->id)}}" class="form" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Tên san phẩm</label>
                  <input class="form-control" name="name" value="{{$sanpham->name}}" placeholder="nhập tên sản phẩm " required />
                  @error('name')
                  <h6 style="color: red">tên sản phẩm quá ngắn</h6>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label>Giá sản phẩm</label>
                  <input type="text" class="form-control" name="price" value="{{$sanpham->price}}" placeholder="nhập giá sản phẩm>>" required />
                  @error('price')
                  <h6 style="color: red">vui lòng nhập số</h6>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Giá khuyến mãi</label>
                  <input type="text" class="form-control" name="sale" value="{{$sanpham->sale}}" placeholder="" required />
                  @error('sale')
                  <h6 style="color: red">vui lòng nhập số</h6>
                  @enderror
                </div>
                
              </div>
             
              <div class="col-md-4">
               
                <div class="form-group">
                  <label>sản phẩm hot</label>
                  <select class="form-control" name="hot" required>
                    {{-- @foreach ($sanpham as $sanpham)
                    <option value="{{$sanpham->id}}">{{$sanpham->hot}}</option>
                    @endforeach --}}
                    <option value="1">1</option>
                    <option value="0">0</option>
                  </select>
                </div>
                {{-- <div class="form-group">
                  <label>kho</label>
                  <input type="number" class="form-control" name="tong_ng" required placeholder="10-100" />
                </div> --}}
                <div class="form-group">
                    <label>ẩn</label>
                    <select class="form-control" name="active" required>
                      <option value="1">1</option>
                      <option value="0">0</option>
                    </select>
                  </div>
                <div class="form-group">
                  <label>Ảnh sản phẩm</label>
                  <input type="file" name="image" value="{{$sanpham->image}}"  />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                 <label>danhmuc</label>
                 <select  class="form-control" name="id_danhmuc" placeholder="nhập tên sản phẩm " required />
                 @foreach ($danhmuc as $danhmuc)
                 <option value="{{$danhmuc->id}}" {{$danhmuc->id==$sanpham->id_danhmuc? 'selected' : ''}}>{{$danhmuc->name}}</option>
                 @endforeach 
                </select>
               </div>
             </div>
          <div class="col-md-12">
            <div class="form-group">
              <label> mô tả </label>
              <textarea id="mytextarea" name="mota" value="{{$sanpham->mota}}" style="width: 70vw"></textarea>
            </div>
          </div>
        </div>
          <div class="control-form col-md-12">
            <button type="submit" class="btn btn-success" name="save" >lưu</button>
          </div>
          </form>
        </div>
        
    </div>

</section>
@endsection