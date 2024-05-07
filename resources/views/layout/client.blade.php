<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('fontend/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('fontend/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/lib/owlcarousel/assets/owl/carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('fontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('fontend/css/layoutlogin.css')}}" rel="stylesheet">
    {{-- jquery rating product --}}
    <!-- Latest compiled and minified CSS -->
    {{--  --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <!-- Topbar Start -->
   @include('block.topbar')
    <!-- Topbar End -->

    <!-- Navbar Start -->
   @include('block.navbar')
    <!-- Navbar End -->

    @yield('content')
   

    <!-- Footer Start -->
    @include('block.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('fontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('fontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('fontend/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('fontend/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('fontend/js/main.js')}}"></script>
    {{--  --}}
    @if (Session::has('msgsuccess'))

    <script>
        swal("Thành công", "{{ session::get('msgsuccess') }}", "success");
    </script>
    @elseif(Session::has('msgwarning'))
    <script>
        swal("Thất bại", "{{ session::get('msgwarning') }}", "warning");
    </script>
    @endif
</body>

</html>