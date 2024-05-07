@extends('layout.admin')
@section('title')
{{$title}}
@endsection
@section('content')
<section class=" wrapper">
    <div class="agile-grid">
    <h2 class="w3ls_head">VOUCHER</h2>
    <div class="stats-last-agile">
        <table class="table stats-table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TÊN MÃ GIẢM</th>
                    <th>CODE</th>
                    <th>GIẢM THEO</th>
                    <th>GIÁ VOUCHER GIẢM</th>
                    <th>SỐ LƯỢNG VOUCHER</th>
                    <th>SỬA</th>
                    <th>XÓA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($voucher as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->voucher_name}}</td>
                    <td>{{$item->voucher_coder}}</td>
                    @if ($item->voucher_tinhtrang==1)
                    <td><span class="label label-success">GIẢM THEO %</span></td>
                    <td>{{$item->voucher_so}}%</td>
                    @else
                    <td><span class="label label-success">GIẢM THEO VNĐ</span></td>
                    <td>{{$item->voucher_so}}VNĐ</td>
                    @endif
                    <td>{{$item->voucher_time}}</td>
                    <td><a href="{{route('admin.voucher.edit',$item)}}" class="btn btn-success"><i class="fa-solid fa-user-pen"></i></a> 
                       
                    </td>
                    <td>
                        <form action="{{route('admin.voucher.destroy',$item)}}" method="POST">
                            @csrf
                            @method('DELETE') 
                            <button class="btn btn-danger" onclick="return confirm('mày có chắc muốn xóa ko')" ><i class="fa-solid fa-trash-can"></i></button>
                        </form>  
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    </div>
 
    
    </section>


    @endsection