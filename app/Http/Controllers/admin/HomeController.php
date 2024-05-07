<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $data=[];
    public function dashboard()
    {
        $this->data['title']='dashboard';
        return view('admin.page.dashAdmin',$this->data);
    }
}
