@extends('layout.admin')
@section('title')
{{$title}}
@endsection
@section('content')
<section class=" wrapper">
    <div class="typo-agile">
      <h2 class="w3ls_head">THÊM DANH MUC</h2>
      <div class="row">
        <!-- form -->
        <form action="{{route('admin.danh-muc.update',$danhmuc->id)}}" class="form" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT') 
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên Danh Mục</label>
              <input type="text" class="form-control" name="name" value="{{$danhmuc->name}}" placeholder="Nhập tên danh mục" required />
              @error('name')
              <h6 style="color: red">tên danh mục quá ngắn</h6>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">nhập ảnh</label>
               <input type="file" name="image">
             </div>
          </div>
          <div class="control-form col-md-12">
            <button type="submit" class="btn btn-success">Cập Nhật</button>
          </div>
        </form>
      </div>

    </div>
</section>
@endsection