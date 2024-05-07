@extends('layout.admin')
@section('title')
{{$title}}
@endsection
@section('content')
<section class=" wrapper">
    <div class="agile-grid">
    <h2 class="w3ls_head">DANH MỤC</h2>
    <div class="stats-last-agile">
        <table class="table stats-table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TÊN</th>
                    <th>ẢNH</th>
                    <th>NGÀY TẠO</th>
                    <th>SỬA</th>
                    <th>XÓA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($danhmuc as $item)
                <tr>
                   
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td><img src="{{asset('image/'.$item->image)}}" alt="" width="50px"></td>
                    <td><span class="label label-success">{{$item->created_at}}</span></td>
                    <td><a href="{{route('admin.danh-muc.edit',$item)}}" class="btn btn-success"><i class="fa-solid fa-user-pen"></i></a> 
                       
                    </td>
                    <td>
                        <form action="{{route('admin.danh-muc.destroy',$item)}}" method="POST">
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