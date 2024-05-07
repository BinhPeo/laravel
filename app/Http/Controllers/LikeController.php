<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Danhmuc;
use App\Models\like;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public $data=[];
    public function like()
    {

        $this->data['title']='Sản Phẩm Bạn Yêu Thích';
        $danhmuc=Danhmuc::all();
        $user_id=Auth()->id();
        $like=like::where('user_id',auth()->id())->get();
        return view('page.like',$this->data,compact('like','danhmuc'));
    }
    public function addlike(Product $product, Request $request)
    {
        $user_id = auth()->id();
        $likeExist = Like::where([
            'user_id' => $user_id,
            'product_id' => $product->id
        ])->first();
    
        if (!$likeExist) {
            $data = [
                'user_id' => $user_id,
                'product_id' => $product->id,
            ];
            if (Like::create($data)) {
                return back()->with('ssmsg', 'Thêm sản phẩm yêu thích thành công');
            }
        } else {
            $likeExist->delete();
            return back()->with('ssmsg', 'Xóa sản phẩm yêu thích thành công');
        }
    
        return back()->with('ermsg', 'Thao tác không thành công, vui lòng thử lại');
    }
    public function deletelike(string $id)
    {
        $like = Like::find($id);
        if ($like) {
            $like->delete();
            return back()->with('ssmsg', 'Thêm sản phẩm yêu thích thành công');
        }
        return redirect()->route('like');
    }
}

