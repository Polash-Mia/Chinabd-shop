<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        @foreach ($settings as $setting)
            {{ $setting->title }}
        @endforeach
    </title>
    
    @foreach ($settings as $setting)
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $setting->pixel }}');
            fbq('track', 'PageView');
        </script>

    @endforeach
    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    {{-- <link href="img/favicon.ico" rel="icon"> --}}
    @foreach ($settings as $setting )
    <link rel="shortcut icon" href="{{asset($setting->logo)}}">
    @endforeach

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('/')}}website/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('/')}}website/css/style.css" rel="stylesheet">
    @stack('style')
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">

        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{route('home')}}" class="text-decoration-none ml-5">

					{{-- <img class="" src="{{asset('/')}}website/img/637b709aa4a83.png" alt="" height="70 px" width="150 px"> --}}
                    @foreach ($settings as $setting )
					<img class="" src="{{asset($setting->logo)}}" alt="" height="70 px" width="150 px">
                    @endforeach
                    {{-- <img class="img-fluid w-100 h-100" src="{{asset($product->image)}}" alt="" style="height: 100%; width:100%;"> --}}
                </a>
            </div>
            {{-- <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="সার্চ করুন">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div> --}}

            <div class="col-lg-6 col-6 text-left">
                <form action="{{route('search')}}" method="get">
                {{-- <form action="" method="get"> --}}
                    @csrf
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="সার্চ করুন">
                        <button type="submit" class="input-group-text bg-transparent text-primary"><i class="fa fa-search"></i></button>

                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right ">
                <a href="" class="tel:01793679254" >
                    <i class="fas fa-phone-alt text-white  "></i>
                    @foreach ($settings as $setting )
                        
                   
                    <span class="badge text-white "><h6 class="text-white">{{ $setting->mobile }}</h6></span>

                    @endforeach
                    {{-- <span class="badge text-white "><h6 class="text-white">01968573982</h6></span> --}}
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-white"></i>
                    <span class="badge text-white ">{{$totalCartProduct}}</span>
                </a>
            </div>
        </div>
    </div>


	<!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid ">
        <div class="row border-top px-xl-5 bg-danger">

            <div class="col-lg-12 ">
                <nav class="navbar navbar-expand-lg   py-3 py-lg-0 px-0">
                    <a href="{{route('home')}}" class="text-decoration-none d-block d-lg-none">
                         @foreach ($settings as $setting )
					<img class="" src="{{asset($setting->logo)}}" alt="" height="70 px" width="150 px">
                    @endforeach
                        {{-- <img class="" src="{{asset('/')}}website/img/637b709aa4a83.png" alt="" height="70 px" width="150 px"> --}}
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <i class="fa fa-bars" id="cat_menu_mobile_btn"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0 ">
                            <a href="{{route('home')}}" class="nav-item hoba nav-link text-white fw-bold active">Home</a>

                            @foreach ($categories as $category)
                            <a href="{{route('category', ['id' => $category->id])}}" class="nav-item hoba nav-link text-white fw-bold">{{$category->name}}</a>
                            @endforeach

                            {{-- <a href="detail.html" class="nav-item nav-link text-white fw-bold">Health & Beauty</a>
                            <a href="contact.html" class="nav-item nav-link text-white fw-bold ">Hot Offer</a>
							<a href="contact.html" class="nav-item nav-link text-white fw-bold ">Kitchen Gadgets</a>
							<a href="contact.html" class="nav-item nav-link text-white fw-bold ">Security</a>
							<a href="contact.html" class="nav-item nav-link text-white fw-bold ">All Kinds Of Rack</a>
							<a href="contact.html" class="nav-item nav-link text-white fw-bold ">Bracelet</a>
							<a href="contact.html" class="nav-item nav-link text-white fw-bold ">MAGNETIC RING</a> --}}
                        </div>

                    </div>
                </nav>

            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->

    <!-- Featured End -->


    <!-- Categories Start -->

	<!-- Categories End -->


    <!-- Offer Start -->


   <!-- Offer End -->


    <!-- Products Start -->

   <!-- Products End -->


    <!-- Subscribe Start -->


	<!-- Subscribe End -->


    <!-- Products Start -->

    @yield('body')

    <!-- Products End -->



                    {{-- <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center mb-3">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div> --}}





    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-dark mt-5 ">

        <div class="row border-top  mx-xl-5 py-3">
            <div class="col-md-12 px-xl-0">
                <p class=" text-center text-md-center text-white">
                    &copy; 2023 <a href="#" class="text-success">
                        @foreach ($settings as $setting)
                        {{ $setting->title }}
                    @endforeach
                </a> All Right Reserved | Developed by <a href="http://bengal-it.com/" class="text-success" target="_blank">Bengal-IT</a> 
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}website/lib/easing/easing.min.js"></script>
    <script src="{{asset('/')}}website/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('/')}}website/mail/jqBootstrapValidation.min.js"></script>
    <script src="{{asset('/')}}website/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('/')}}website/js/main.js"></script>


    @stack('script')


</body>

</html>
