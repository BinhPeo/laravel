<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $data=[];
    public function dashboard()
    {
        $this->data['title']='dashboard';
        return view('page.dashAdmin',$this->data);
    }
    public function danhmuc()
    {
        $this->data['title']='quản lý danh mục';
        return view('page.danhmucAdmin',$this->data);
    }
    public function updatadm()
    {
        $this->data['title']='cập nhập danh mục';
        return view('page.updatadmAdmin',$this->data);
    }
    public function insetdm()
    {
        $this->data['title']='thêm danh mục';
        return view('page.insetdmAdmin',$this->data);
    }
    public function sanpham()
    {
        $this->data['title']='quản lý sản phẩm';
        return view('page.sanphamAdmin',$this->data);
    }
    public function updatasp()
    {
        $this->data['title']='cập nhập sản phẩm';
        return view('page.updataspAdmin',$this->data);
    }
    public function insetsp()
    {
        $this->data['title']='thêm sản phẩm';
        return view('page.insetspAdmin',$this->data);
    }
    public function taikhoan()
    {
        $this->data['title']= 'Quản lý tài khoản';
        return view('page.taikhoanAdmin',$this->data);
    }

}
