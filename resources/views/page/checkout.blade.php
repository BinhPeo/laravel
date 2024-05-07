@extends('layout.client')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-cart text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Checkout</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Checkout Start -->
<div class="container-fluid">
    <form action="" method="post">
        @csrf
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>họ và tên</label>
                        <input class="form-control" type="text" placeholder="John" value="{{$user->name}}" name="name">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" placeholder="example@email.com" value="{{$user->email}}" name="email">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control" type="text" placeholder="+123 456 789" value="{{$user->phone}}" name="phone">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" placeholder="123 Street" name="address">
                    </div>
                </div>
            </div>
            <div class="collapse mb-5" id="shipping-address">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                <div class="bg-light p-30">
                   
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">giả hàng đã đặt</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">Products</h6>
                    @php
                    $total=0
                    @endphp
                    @foreach ($carts as $cart)
                    <div class="d-flex justify-content-between">
                        <p>{{$cart->product->name}} </p>
                        <span>X{{$cart->quantity}}</span>
                        <p>{{$cart->price*$cart->quantity}}</p>
                        
                    </div>
                    @php
                    $total+= $cart->price*$cart->quantity
                    @endphp
                    @endforeach
                </div>
                <div class="border-bottom pt-3 pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>{{$total}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Giảm giá</h6>
                        <h6 class="font-weight-medium">{{$displayValue}}</h6>
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
                </div>
            </div>
        </form>
            <div class="mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                <div class="bg-light p-30">
                    <form action="{{url('/vnpay')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="hidden" name="total" value="@if(session()->has('voucher'))
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
                    
                                {{ $discountedTotal }}
                                @else
                                {{ $total }}
                            @endif">
                                <button type="submit" class="btn btn-block btn-primary font-weight-bold py-2" name="redirect">thanh toán bằng Vnpay</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{url('/momopay')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="hidden" name="total" value="@if(session()->has('voucher'))
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
                    
                                {{ $discountedTotal }}
                                @else
                                {{ $total }}
                            @endif">
                                <button type="submit" class="btn btn-block btn-primary font-weight-bold py-2" name="payUrl">thanh toán bằng MOMO</button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group mb-4">
                        <div class="custom-control custom-radio">
                            <button class="btn btn-block btn-primary font-weight-bold py-2">thanh toán bằng tiền mặt</button>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Checkout End -->
@endsection