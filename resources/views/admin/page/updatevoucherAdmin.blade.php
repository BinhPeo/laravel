@extends('layout.admin')
@section('title')
    {{$title}}
@endsection
@section('content')
<section class="wrapper">
    <div class="typo-agile">
        <h2 class="w3ls_head">THÊM VOUCHER</h2>
        <div class="row">
            <!-- form -->
            <form action="{{route('admin.voucher.update', $voucher->id)}}" class="form" method="post">
              @csrf
              @method('PUT')
              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tên mã giảm giá</label>
                  <input class="form-control" name="voucher_name" placeholder="nhập tên Voucher " value="{{$voucher->voucher_name}}" required />
                  @error('voucher_name')
                     <h6 style="color: red">Tên mã ngắn</h6> 
                  @enderror
                </div>
                
                <div class="form-group">
                  <label>Mã giảm giá</label>
                  <input type="text" class="form-control" name="voucher_coder" placeholder="tạo mã voucher" value="{{$voucher->voucher_coder}}" />
                  @error('voucher_coder')
                  <h6 style="color: red">Không được bỏ trống</h6> 
               @enderror
                </div>                
              </div>
             
              <div class="col-md-6">
                <div class="form-group">
                    <label>số lượng mã</label>
                    <input type="number" class="form-control" name="voucher_time" placeholder="nhập giá sản phẩm>>" value="{{$voucher->voucher_time}}" required />
                    @error('voucher_time')
                        <h6 style="color: red">Không được nhập kí tự khác ngoài số</h6>
                    @enderror
                  </div>   
                  <div class="form-group">
                    <label>Tính năng mã</label>
                    <select class="form-control" name="voucher_tinhtrang" id="voucher_tinhtrang" required>
                        <option value="0" {{ $voucher->voucher_tinhtrang == 0 ? 'selected' : '' }}>=====chọn=====</option>
                        <option value="1" {{ $voucher->voucher_tinhtrang == 1 ? 'selected' : '' }}>GIẢM THEO %</option>
                        <option value="2" {{ $voucher->voucher_tinhtrang == 2 ? 'selected' : '' }}>GIẢM THEO TIỀN</option>
                    </select>
                </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="voucher_so">Nhập số % hoặc số tiền giảm</label>
                        <div class="input-group">
                            <input class="form-control" name="voucher_so" id="voucher_so"value="{{$voucher->voucher_so  }}" ></textarea>
                            @error('voucher_so')
                            <h6 style="color: red">Không được nhập kí tự khác ngoài số</h6>
                        @enderror
                            <div class="input-group-append">
                            </div>
                        </div>
                    </div>
                </div>
                
                <script>
                    const voucherTinhtrang = document.getElementById('voucher_tinhtrang');
                    const voucherSo = document.getElementById('voucher_so');
                    
                    voucherTinhtrang.addEventListener('change', function() {
                        if (voucherTinhtrang.value === '1') {
                            voucherSo.setAttribute('max', '100');
                        } else {
                            voucherSo.removeAttribute('max');
                        }
                    });
                    
                    voucherSo.addEventListener('input', function() {
                        if (voucherTinhtrang.value === '1' && parseFloat(voucherSo.value) > 100) {
                            voucherSo.value = '100';
                        }
                    });
                </script>
                </div>
                <div class="control-form col-md-12">
                    <button type="submit" class="btn btn-success" name="save" >lưu mã giảm</button>
                </div>
          </form>
        </div>
        
    </div>
</section>
@endsection