<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comments;
use App\Models\Danhmuc;
use App\Models\like;
use App\Models\Momo;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use App\Models\Vnpay;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public $data = [];
    public function index()
    {
        $this->data['title'] = 'Trang Chu';
        $product = Product::all();
        $user = User::all();
        $user_id = Auth()->id();
        $like = like::where('user_id', auth()->id())->get();
        $danhmuc = Danhmuc::latest()->limit(4)->get();
        return view('page.home', $this->data, compact('product', 'danhmuc', 'user'));
    }
    public function chitiet($id)
    {
        $this->data['title'] = 'chi tiet san pham';
        $product = Product::find($id);
        $danhmuc = Danhmuc::all();
        $user_id = Auth()->id();
        $comments = Comments::where('product_id', $product->id)->get();
        $averageRating = Comments::where('product_id', $product->id)->avg('rating');
        $likeCount = like::where('user_id', $user_id)->count();
        $cartCount = Cart::where('user_id', $user_id)->count();
        return view('page.detail', $this->data, compact('product', 'likeCount', 'comments', 'danhmuc', 'cartCount', 'averageRating'));
    }
    public function shop()
    {
        $this->data['title'] = 'shop';
        $danhmuc = Danhmuc::all();
        $product = Product::paginate(9);
        $user_id = Auth()->id();
       
        return view('page.shop', $this->data, compact('product', 'danhmuc'));
    }
    public function checkout(Request $request)
    {
        $this->data['title'] = 'checkout';
        if(isset($_GET['partnerCode']))
        {
           $datamomo=
           [
            'partnerCode'=>$_GET['partnerCode'],
            'orderId'=>$_GET['orderId'],
            'requestId'=>$_GET['requestId'],
            'amount'=>$_GET['amount'],
            'orderInfo'=>$_GET['orderInfo'],
            'transId'=>$_GET['transId'],
            'orderType'=>$_GET['orderType'],
            'payType'=>$_GET['payType'],
            'signature'=>$_GET['signature'],
            'paymentOption'=>$_GET['paymentOption'],
           ];
           $momoOrder = new Momo($datamomo);
           $momoOrder->save();
           
        };
        if(isset($_GET['vnp_Amount']))
        {
        
           $datavnpay=
           [
            'vnp_Amount'=>$_GET['vnp_Amount'],
            'vnp_BankCode'=>$_GET['vnp_BankCode'],
            'vnp_BankTranNo'=>$_GET['vnp_BankTranNo'],
            'vnp_CardType'=>$_GET['vnp_CardType'],
            'vnp_OrderInfo'=>$_GET['vnp_OrderInfo'],
            'vnp_PayDate'=>$_GET['vnp_PayDate'],
            'vnp_ResponseCode'=>$_GET['vnp_ResponseCode'],
            'vnp_TmnCode'=>$_GET['vnp_TmnCode'],
            'vnp_TransactionNo'=>$_GET['vnp_TransactionNo'],
            'vnp_TransactionStatus'=>$_GET['vnp_TransactionStatus'],
            'vnp_TxnRef'=>$_GET['vnp_TxnRef'],
            'vnp_SecureHash'=>$_GET['vnp_SecureHash'],
           ];
           $VnpayOrder = new Vnpay($datavnpay);
           $VnpayOrder->save();
           return redirect()->route('cart')->with('ssmsg', 'Thêm vào giỏ hàng thành công');
        };
        $danhmuc = Danhmuc::all();
        $product = Product::paginate(9);
        $selectedPayment = $request->input('payment');
        $user = Auth()->user();
        $voucher = session('voucher');
        $displayValue = '';
        if($voucher)
        {
            $voucherSo = $voucher->voucher_so;

            if ($voucher->voucher_tinhtrang == 1) {
                $displayValue = $voucherSo . '%';
            } elseif ($voucher->voucher_tinhtrang == 2) {
                $displayValue = $voucherSo . 'VND';
            }
        }
       
        return view('page.checkout', $this->data, compact('product','user',  'danhmuc','displayValue','selectedPayment'));
    }
    public function checkoutpost(Request $request)
    {
        $user= Auth()->user();
        $data=$request->only('name','email','phone','address');
        $data['user_id']=$user->id;
        if($checkout=Order::create($data))
        {
            foreach($user->cart as $items)
            {
                $orderdetail=[
                    'checkout_id'=>$checkout->id,
                    'product_id'=>$items->product->id,
                    'quantity'=>$items->quantity,
                    'price'=>$items->price,
                ];
                OrderDetail::create($orderdetail);
            }
        }

        
    }
    
    public function gmail()
    {
        $name = 'gửi mail thành công';
        Mail::send('email.email', compact('name'), function ($email) {
            $email->to('onhbinh55430@gmail.com', 'đào thanh bình');
        });
    }
public function Comments(Product $product, Request $request)
{
    $user_id = auth()->id();
    $rating = $request->input('rating');
    $commentContent = $request->input('comments');
    $existingComment = Comments::where([
        'user_id' => $user_id,
        'product_id' => $product->id
    ])->first();

    if ($existingComment) {
        return back()->with('msgwarning', 'Bạn đã bình luận trước đó');
    }

    $data = [
        'user_id' => $user_id,
        'product_id' => $product->id,
        'comment' => $commentContent,
        'rating' => $rating
    ];
    if (Comments::create($data)) {
        return back()->with('msgsuccess', 'Đánh giá thành công');
    }
}
}
