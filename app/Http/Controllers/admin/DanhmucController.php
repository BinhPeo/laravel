<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc;
use Illuminate\Http\Request;

class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $data=[];
    public function index()
    {
        $this->data['title']='quản lý danh mục';
        $danhmuc= Danhmuc::all();
        return view('admin.page.danhmucAdmin',$this->data,compact('danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $this->data['title']='thêm danh mục';
        return view('admin.page.insetdmAdmin',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:6',
        ]);
        $danhmuc= Danhmuc::create($request->all());
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Di chuyển tệp ảnh vào thư mục lưu trữ
            $image->move(public_path('image'), $imageName);
            // Gán đường dẫn của ảnh mới cho trường 'images' trong cơ sở dữ liệu
            $danhmuc->image = $imageName;
            $danhmuc->save();
            return redirect()->route('admin.danh-muc.index')->with('msgsuccess',' thêm danh mục thành công =Đ');
        }
        return redirect()->route('admin.danh-muc.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          
        $this->data['title']='updata danh mục';
        $danhmuc=Danhmuc::find($id);
        if($danhmuc)
        {
            return view('admin.page.updatadmAdmin',$this->data,compact('danhmuc'));
        }
        return redirect()->route('admin.danh-muc.index');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:6',
        ]);
        $this->data['title'] = 'Cập nhật danh mục';
        $danhmuc = Danhmuc::find($id);
        if ($danhmuc) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                // Di chuyển tệp ảnh vào thư mục lưu trữ
                $image->move(public_path('image'), $imageName);
                // Xóa ảnh cũ nếu có
                if ($danhmuc->image) {
                    // Lấy đường dẫn đầy đủ của ảnh cũ
                    $oldImagePath = public_path('image') . '/' . $danhmuc->image;
                    // Kiểm tra và xóa ảnh cũ
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                // Gán đường dẫn của ảnh mới cho trường 'image' trong cơ sở dữ liệu
                $danhmuc->image = $imageName;
            }
            $danhmuc->name = $request->name;
            $danhmuc->save();
            return redirect()->route('admin.danh-muc.index')->with('msgsuccess',' cập nhập danh mục thành công =Đ');
        }
        return redirect()->route('admin.danh-muc.index')->with('msgwarning','cập nhập thất bại :"( ');
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $danhmuc=Danhmuc::find($id);
        if($danhmuc)
        {
            Danhmuc::destroy($id);
            return redirect()->route('admin.danh-muc.index')->with('msgsuccess','Xóa danh mục thành công =Đ');
        }
        return redirect()->route('admin.danh-muc.index')->with('msgwarning','Xóa danh mục thất bại :"( ');
        
    }
}
