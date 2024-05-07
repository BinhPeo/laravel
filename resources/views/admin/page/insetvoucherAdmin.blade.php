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
            <form action="{{route('admin.voucher.store')}}" class="form" method="post">
              @csrf
              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tên mã giảm giá</label>
                  <input class="form-control" name="voucher_name" placeholder="nhập tên Voucher " required />
                </div>
                
                <div class="form-group">
                  <label>Mã giảm giá</label>
                  <input type="text" class="form-control" name="voucher_coder" placeholder="tạo mã voucher" required />
                </div>                
              </div>
             
              <div class="col-md-6">
                <div class="form-group">
                    <label>số lượng mã</label>
                    <input type="number" class="form-control" name="voucher_time" placeholder="nhập giá sản phẩm>>" required />
                  </div>   
                  <div class="form-group">
                    <label>Tính năng mã</label>
                    <select class="form-control" name="voucher_tinhtrang" id="voucher_tinhtrang" required>
                        <option value="0">=====chọn=====</option>
                        <option value="1">GIẢM THEO %</option>
                        <option value="2">GIẢM THEO TIỀN</option>
                    </select>
                </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="voucher_so">Nhập số % hoặc số tiền giảm</label>
                        <div class="input-group">
                            <textarea class="form-control" name="voucher_so" id="voucher_so"></textarea>
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
                        }p
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