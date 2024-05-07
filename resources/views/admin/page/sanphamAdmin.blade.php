@extends('layout.admin')
@section('title')
{{$title}}
@endsection
@section('content')
<section class=" wrapper">
    <div class="agile-grid">
    <h2 class="w3ls_head">QUẢN LÝ SẢN PHẨM</h2>
    <div class="stats-last-agile">
        <table class="table stats-table ">
            <thead>
                <tr>
                    <th>ẢNH</th>
                    <th>TÊN</th>
                    <th>GIÁ</th>
                    <th>GIẢM GIÁ</th>
                    <th>HOT</th>
                    <TH>ẨN|HIỆN</TH>
                    <TH>NGÀY TẠO</TH>
                    <TH>SỬA|XÓA</TH>
                </tr>
            </thead>
            <tbody>
                @foreach ($sanpham as $item)
                <tr>
                    <td><img src="{{asset('image/'.$item->image)}}" alt="" width="50px" ></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->sale}}</td>
                    <td>{{$item->hot ==1 ? 'hot':  'không hot'}}</td>
                    <td>{{$item->active ==1 ? 'hiện' : 'ẩn'}}</td>
                    <td><span class="label label-success">{{$item->created_at}}</span></td>
                    <td><a href="{{route('admin.san-pham.edit',$item)}}" class="btn btn-success"><i class="fa-solid fa-user-pen"></i></a> 
                       
                    </td>
                    <td>
                        <form action="{{route('admin.san-pham.destroy',$item)}}" method="POST">
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
    <div class="text-center">
        {{$sanpham->links()}}
    </div>
    </div>
    @if (Session::has('msgsuccess'))
    <script>
        swal("Thành công", "{{ session::get('msgsuccess') }}", "success");
    </script>
    @elseif(Session::has('msgwarning'))
    <script>
        swal("Thất bại", "{{ session::get('msgwarning') }}", "warning");
    </script>
    @endif
    </section>
    @endsection