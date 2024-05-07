<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $data=[];
    public function index()
    {
        $this->data['title']='Quản Lý Voucher';
        $voucher=Voucher::all();
        return view('admin.page.voucherAdmin',$this->data,compact('voucher'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title']='Thêm Voucher';
        $voucher=Voucher::latest()->first();
        return view('admin.page.insetvoucherAdmin',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'voucher_name' => 'required|min:6',
            'voucher_so' => 'required|numeric',
            'voucher_time' => 'required|numeric',
            'voucher_coder' => 'required'
        ]);
        $voucher= Voucher::create($request->all());
        return redirect()->route('admin.voucher.index')->with('msgsuccess','thêm voucher thành công =Đ');
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
        $this->data['title']='update voucher';
        $voucher=Voucher::find($id);
        if($voucher)
        {
            return view('admin.page.updatevoucherAdmin',$this->data,compact('voucher'));
        }
        return redirect()->route('admin.voucher.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'voucher_name' => 'required|min:6',
            'voucher_so' => 'required|numeric',
            'voucher_time' => 'required|numeric',
            'voucher_coder' => 'required'
        ]);
        $this->data['title']='updata danh mục';
        $voucher = Voucher::find($id);
        $voucher->voucher_name = $request->voucher_name;
        $voucher->voucher_so = $request->voucher_so;
        $voucher->voucher_time = $request->voucher_time;
        $voucher->voucher_coder= $request->voucher_coder;
        $voucher->voucher_tinhtrang= $request->voucher_tinhtrang;
        $voucher->save();
        return redirect()->route('admin.voucher.index')->with('msgsuccess','cập nhập voucher thành công =Đ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id)
    {
        $voucher=Voucher::find($id);
        if($voucher)
        {
            Voucher::destroy($id);
            
            return redirect()->route('admin.voucher.index')->with('msgsuccess','Xóa voucher thành công =Đ');
        }
        return redirect()->route('admin.voucher.index')->with('msgwarning','Xóa voucher thất bại :"( ');
    }
}
