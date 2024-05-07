    @extends('layout.client')
    @section('title')
   {{$title}}
@endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>image</th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php
                        $total = 0;
                        @endphp
                        @foreach ($cart as $item)
                            
               
                        <tr>
                            <td class="align-middle"><img src="{{asset('image/'.$item->product->image)}}" alt="" style="width: 50px;"></td>
                            <td> {{$item->product->name}}</td>
                            <td class="align-middle">{{$item->price}}</td>
                            
                            <td class="align-middle">
                                <form action="{{route('updatecart',$item->product_id)}}" method="GET">
                                    
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" name="quantity" value="{{$item->quantity}}">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </td>
                            <td class="align-middle">{{number_format($item->price*$item->quantity)}}</td>
                            <td class="align-middle">
                                    <form action="{{route('deletecart',$item)}}" method="POST">
                                    @csrf
                                    @method('DELETE') 
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('mày có chắc muốn xóa ko')" ><i class="fa fa-times"></i></button>
                                    </form>
                            </td>
                            
                        </tr>
                        @php
                          $total+= $item->price*$item->quantity;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="{{ route('check_voucher') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code" name="voucher_coder">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Mã Giảm Giá</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tổng Giá Sản Phẩm</h6>
                            <h5>{{number_format( $total)}}</h5>
                        
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">mã giảm giá</h6>
                            <h6 class="font-weight-medium">
                                @if(session()->has('voucher'))
                                    @php
                                        $voucher = session('voucher');
                                        $voucherSo = $voucher->voucher_so;
                                        $displayValue = '';
                                        if ($voucher->voucher_tinhtrang == 1) {
                                            $displayValue = $voucherSo . '%';
                                        } elseif ($voucher->voucher_tinhtrang == 2) {
                                            $displayValue = $voucherSo . 'VND';
                                        }
                                    @endphp

                                    {{ $displayValue }}
                                @endif
                            </h6><form action="{{ route('cancel_voucher') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" style="color: #FFD43B;"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            @if(session()->has('voucher'))
                                @php
                                    $voucher = session('voucher');
                                    $discountedTotal = 0;

                                    if ($voucher->voucher_tinhtrang == 1) {
                                        $percent = $voucher->voucher_so / 100;
                                        $discountAmount = $total * $percent;
                                        $discountedTotal = $total - $discountAmount;
                                    } elseif ($voucher->voucher_tinhtrang == 2) {
                                        $discountedTotal = $total - $voucher->voucher_so;
                                    }
                                @endphp

                                <h5>{{ number_format($discountedTotal) }}</h5>
                            @else
                                <h5>{{ number_format($total) }}</h5>
                            @endif
                            
                        </div>
                        <a class="btn btn-block btn-primary font-weight-bold my-3 py-3" href="{{route('checkout')}}">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <!-- Cart End -->