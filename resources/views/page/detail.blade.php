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
                <span class="breadcrumb-item active">Shop Detail</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Detail Start -->
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{asset('image/'.$product->image)}}" alt="Image">
                    </div>
                   
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">

                <h3>{{$product->name}}</h3>
                <div class="d-flex mb-3" id="ratingStars">
                    <!-- Đoạn mã HTML để hiển thị số sao -->
<!-- Đoạn mã HTML để hiển thị số sao -->
                <div class="text-primary mr-2" id="ratingStars">
                    <small class="fas fa-star text-warning"></small>
                    <small class="fas fa-star text-warning"></small>
                    <small class="fas fa-star text-warning"></small>
                    <small class="fas fa-star text-warning"></small>
                    <small class="fas fa-star text-warning"></small>
                </div>
<!-- Đoạn mã JavaScript và PHP để tính và hiển thị trung bình số sao -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var averageRating = <?php echo $averageRating; ?>; // Lấy giá trị trung bình số sao từ biến PHP

    // Làm tròn giá trị trung bình số sao đến 1 chữ số thập phân
    var roundedRating = Math.round(averageRating * 10) / 10;

    // Xác định số sao được hiển thị dựa trên giá trị trung bình
    var starRating = '';
    for (var i = 1; i <= 5; i++) {
        if (i <= roundedRating) {
            starRating += '<small class="fas fa-star text-warning"></small>';
        } else {
            starRating += '<small class="far fa-star text-warning"></small>';
        }
    }

    // Đặt nội dung số sao vào phần tử có id="ratingStars"
    $('#ratingStars').html(starRating);
});
</script>

                    <small class="pt-1" id="reviewCount">(99 Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">GIÁ GỐC:{{$product->price}}</h3>
                <h3 class="font-weight-semi-bold mb-4">GIẢM CÒN:{{$product->sale}}</h3>
                <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit
                    clita ea. Sanc ipsum et, labore clita lorem magna duo dolor no sea
                    Nonumy</p>
                <div class="d-flex mb-3">
                    <strong class="text-dark mr-3">Sizes:</strong>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-1" name="size">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" name="size">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-4" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-5" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex mb-4">
                    <strong class="text-dark mr-3">Colors:</strong>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                            <label class="custom-control-label" for="color-1">Black</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-2" name="color">
                            <label class="custom-control-label" for="color-2">White</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-3" name="color">
                            <label class="custom-control-label" for="color-3">Red</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-4" name="color">
                            <label class="custom-control-label" for="color-4">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-5" name="color">
                            <label class="custom-control-label" for="color-5">Green</label>
                        </div>
                    </form>
                </div>
                <form action="{{route('addcart',$product->id)}}" method="POST">
                    @csrf
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            {{-- <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button> --}}
                        </div>
                        <input type="number" class="form-control bg-secondary border-0 text-center" name="quantity" value="1" min="1">
                        <div class="input-group-btn">
                            {{-- <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button> --}}
                        </div>
                    </div>
                    @if(Auth::check())
                    <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                        Cart</button>
                        @else
                        <a href="{{route('login')}}" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1" ></i> Add To
                            Cart</a>
                            @endif
                    </form>
                          
                   
                </div>
                <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">Share on:</strong>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                        <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna et.</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                  </ul> 
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                  </ul> 
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review for "Product Name"</h4>
                                @foreach($comments as $comment)
                                    <div class="media mb-4">
                                        <img src="{{ asset('image/'.$comment->user->image) }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>{{ $comment->user->name }}<small> - <i>{{ $comment->created_at }}</i></small></h6>
                                            <div class="text-primary mb-2">
                                                @php
                                                    $rating = $comment->rating;
                                                    $fullStars = floor($rating);
                                                    $halfStar = ceil($rating - $fullStars);
                                                    $emptyStars = 5 - $fullStars - $halfStar;
                                                @endphp
                                                @for($i = 0; $i < $fullStars; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                                @if($halfStar)
                                                    <i class="fas fa-star-half-alt"></i>
                                                @endif
                                                @for($i = 0; $i < $emptyStars; $i++)
                                                    <i class="far fa-star"></i>
                                                @endfor
                                            </div>
                                            <p>{{ $comment->commet }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-md-6">
                                <form action="{{ route('comments', $product) }}" method="post">
    @csrf
    <h4 class="mb-4">Leave a review</h4>
    <small>Your email address will not be published. Required fields are marked *</small>
    <div class="d-flex my-3">
        <p class="mb-0 mr-2">Your Rating * :</p>
        <div class="text-primary">
            <input type="hidden" name="rating" id="rating" value="0">
            <i class="far fa-star rating-star" data-star="1"></i>
            <i class="far fa-star rating-star" data-star="2"></i>
            <i class="far fa-star rating-star" data-star="3"></i>
            <i class="far fa-star rating-star" data-star="4"></i>
            <i class="far fa-star rating-star" data-star="5"></i>
        </div>
    </div>

    <div class="form-group">
        <label for="message">Your Review *</label>
        <textarea cols="30" rows="5" class="form-control" name="comments"></textarea>
    </div>

    @if (session('msgwarning'))
    <div class="alert alert-success">
        {{ session('msgwarning') }}
    </div>
@endif

    <div class="form-group mb-0">
        <input type="submit" value="Đánh Giá Sản Phẩm" class="btn btn-primary px-3">
    </div>
</form>
                            </div>
                            
                            <script>
                                const ratingStars = document.querySelectorAll('.rating-star');
                                const ratingInput = document.getElementById('rating');
                            
                                ratingStars.forEach(star => {
                                    star.addEventListener('click', () => {
                                        const starValue = star.getAttribute('data-star');
                                        ratingInput.value = starValue;
                            
                                        ratingStars.forEach(s => {
                                            if (s.getAttribute('data-star') <= starValue) {
                                                s.classList.add('fas');
                                                s.classList.remove('far');
                                            } else {
                                                s.classList.add('far');
                                                s.classList.remove('fas');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->


<!-- Products Start -->

<!-- Products End -->
@endsection