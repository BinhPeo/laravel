@extends('layout.client')
@section('title')
{{$title}}
@endsection
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">like</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Image</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Sale</th>
                        <th>Like</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($like as $ite)
                    <tr>
                        <td class="align-middle"><img src="{{asset('image/'.$ite->product->image)}}" alt="" style="width: 50px;"></td>
                        <td class="align-middle">{{$ite->product->name??'none'}}</td>
                        <td class="align-middle">{{$ite->product->price??'none'}}</td>
                        <td class="align-middle">{{$ite->product->sale??'none'}}</td>
                        <td class="align-middle">
                            
                                <form action="{{route('deletelike',$ite)}}" method="POST">
                                @csrf
                                @method('DELETE') 
                                <button class="btn btn-sm btn-light" onclick="return confirm('mày có chắc muốn xóa ko')" ><i class="fa fa-heart" style="color:#ff0000" ></i></button>
                                </form> 
                        </td>
                    </tr>
                    @endforeach 
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
<!-- Cart End -->