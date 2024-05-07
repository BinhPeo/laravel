<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc;
use App\Models\Product;
use Illuminate\Http\Request;

class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $data=[];
    public function index()
    {
        $this->data['title']='Quản Lý Sản Phẩm';
        $sanpham= Product::paginate(10);

        return view('admin.page.sanphamAdmin',$this->data,compact('sanpham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title']='Thêm Sản Phẩm';
        $danhmuc=Danhmuc::all();
        $sanpham=Product::all();
        return view('admin.page.insetspAdmin',$this->data,compact('danhmuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'price' => 'required|numeric',
            'sale' => 'required|numeric'
        ]);
        $sanpham= Product::create($request->all());
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Di chuyển tệp ảnh vào thư mục lưu trữ
            $image->move(public_path('image'), $imageName);
            // Gán đường dẫn của ảnh mới cho trường 'images' trong cơ sở dữ liệu
            $sanpham->image = $imageName;
            $sanpham->save();
        }
        return redirect()->route('admin.san-pham.index')->with('msgsuccess','thêm sản phẩm thành công =Đ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['title']='updata danh mục';
        $danhmuc=Danhmuc::all();
        $sanpham=Product::find($id);
        if($sanpham)
        {
            return view('admin.page.updataspAdmin',$this->data,compact('sanpham','danhmuc'));
        }
        return redirect()->route('admin.san-pham.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:6',
            'price' => 'required|numeric',
            'sale' => 'required|numeric'
        ]);
        $this->data['title']='updata danh mục';
        $sanpham = Product::find($id);
        if ($sanpham) {          
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                // Di chuyển tệp ảnh vào thư mục lưu trữ
                $image->move(public_path('image'), $imageName);
                // Gán đường dẫn của ảnh mới cho trường 'image' trong cơ sở dữ liệu
                $sanpham->image = $imageName;
            }
            $sanpham->name = $request->name;
            $sanpham->price=$request->price;
            $sanpham->sale=$request->sale;
            $sanpham->hot=$request->hot;
            $sanpham->active=$request->active;
            $sanpham->mota=$request->mota;
            $sanpham->id_danhmuc = $request->id_danhmuc;
            $sanpham->save();
            
            return redirect()->route('admin.san-pham.index')->with('msgsuccess',' cập nhập sản phẩm thành công =Đ');
        }
        
        return redirect()->route('admin.san-pham.index')->with('msgwarning','cập nhập thất bại :"( ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanpham=Product::find($id);
        if($sanpham)
        {
            Product::destroy($id);
            return redirect()->route('admin.san-pham.index')->with('msgsuccess','Xóa sản phẩm thành công =Đ');
        }
        return redirect()->route('admin.san-pham.index')->with('msgwarning','Xóa sản phẩm thất bại :"( ');
    }
}
