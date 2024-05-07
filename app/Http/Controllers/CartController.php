<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Danhmuc;
use App\Models\like;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    public $data=[];
    public function check_voucher(Request $req)
{
    
    $voucher_code = $req->input('voucher_coder');
    $voucher = Voucher::where('voucher_coder', $voucher_code)->first();
    if ($voucher) {
        $req->session()->put('voucher', $voucher);
    }
    
    return redirect()->route('cart');
}
        public function cancel_voucher(Request $req)
    {
        // Remove the voucher from the session
        $req->session()->forget('voucher');

        // Redirect back to the cart page or any other desired page
        return redirect()->route('cart');
    }
    public function cart()
    {

        $this->data['title']='Trang Chu';
        $danhmuc=Danhmuc::all();
        $user_id=Auth()->id();
        $cartCount = Cart::where('user_id',$user_id)->count();
        $cart=Cart::where('user_id',auth()->id())->get();
        $likeCount = like::where('user_id',$user_id)->count();
        return view('page.cart',$this->data,compact('cart','likeCount','danhmuc','cartCount'));
    }
    public function addcart(Product $product, Request $request)
    {
        $quantity = $request->quantity ? floor($request->quantity) : 1;
        $user_id = auth()->id();
        $cartExist = Cart::where([
            'user_id' => $user_id,
            'product_id' => $product->id
        ])->first();

        if ($cartExist) {
            Cart::where([
                'user_id' => $user_id,
                'product_id' => $product->id
            ])->increment('quantity', $quantity);
            return redirect()->route('cart')->with('msgsuccess  ', 'Thêm vào giỏ hàng thành công');
        } else {
            $data = [
                'user_id' => $user_id,
                'product_id' => $product->id,
                'quantity' => $quantity
            ];
            if (Cart::create($data)) {
                return redirect()->route('cart')->with('msgsuccess', 'Thêm vào giỏ hàng thành công');
            }
        }
        return redirect()->route('index')->with('msgwarning', 'Thêm vào giỏ hàng thất bại, vui lòng thử lại');
    }
    public function updatecart(Product $product, Request $request)
    {
        $quantity = $request->quantity ? floor($request->quantity) : 1;
        $user_id = auth()->id();
        $cartExist = Cart::where([
            'user_id' => $user_id,
            'product_id' => $product->id
        ])->first();

         if ($cartExist) {
            Cart::where([
                'user_id' => $user_id,
                'product_id' => $product->id
            ])->update([
                'quantity' => $quantity
            ]);
            return redirect()->route('cart')->with('msgsuccess', 'update vào giỏ hàng thành công');
        }
        return redirect()->route('index');
    }
    public function deletecart(string $id)
    {
        $cart=Cart::find($id);
        if($cart)
        {
            Cart::destroy($id);
            return redirect()->route('cart')->with('msgsuccess', 'xóa khỏi giỏ hàng thành công');
        }
        return redirect()->route('cart')->with('msgwarning', 'xóa khỏi giỏ hàng thất bại, vui lòng thử lại');
    }

}
