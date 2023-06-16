<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="Sea Otoy Beach House">
        <title>Sea Otoy</title>        
		
        <link rel="icon" type="image/png" href="{{ asset('uploads/'.$global_setting_data->favicon) }}">

        @include('front.layout.styles')

        @include('front.layout.scripts')        
        



        <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
        
        <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $global_setting_data->analytic_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $global_setting_data->analytic_id }}');
        </script>
        <style>
            .main-nav nav .navbar-nav .nav-item a:hover,
            .main-nav nav .navbar-nav .nav-item:hover a,
            .slide-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .slide-carousel.owl-carousel .owl-nav .owl-next:hover,
            .room-detail-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .room-detail-carousel.owl-carousel .owl-nav .owl-next:hover {
                color: {{ $global_setting_data->theme_color_1 }};
            }

            .slider .text .button a:hover{
                background-color: {{ $global_setting_data->theme_color_2 }}!important;
            }

            .main-nav nav .navbar-nav .nav-item .dropdown-menu li a:hover,
            .primary-color {
                color: {{ $global_setting_data->theme_color_1 }}!important;
            }

            .testimonial-carousel .owl-dots .owl-dot,
            .footer ul.social li a,
            .footer input[type="submit"],
            .room-detail .right .widget .book-now {
                background-color: {{ $global_setting_data->theme_color_1 }};
            }

            .slider .text .button a:hover,
            .bg-website:hover,
            .search-section button[type="submit"],
             {
                background-color: {{ $global_setting_data->theme_color_1 }}!important;
            }

            .slide-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .slide-carousel.owl-carousel .owl-nav .owl-next:hover,
            .search-section button[type="submit"],
            .room-detail-carousel.owl-carousel .owl-nav .owl-prev:hover, 
            .room-detail-carousel.owl-carousel .owl-nav .owl-next:hover,
            .room-detail .amenity .item {
                border-color: {{ $global_setting_data->theme_color_1 }}!important;
            }

            .slider .text .button a,
            .room-detail .amenity .item,
            .bg-website,
            .cart .table-cart tr th {
                background-color: {{ $global_setting_data->theme_color_2 }}!important;
            }
        </style>

    </head>
    <body>
        
        


        <div class="navbar-area sticky-top" id="stickymenu">

            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('uploads/'.$global_setting_data->favicon) }}" alt="logo">
                </a>
            </div>
        
            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="logo">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">        
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                                </li>

                                @if($global_page_data->blog_status == 1)
                                <li class="nav-item">
                                    <a href="{{ route('blog') }}" class="nav-link">Activity</a>
                                </li>
                                @endif

                                <li class="nav-item">
                                    <a href="{{route('room')}}" class="nav-link">Accommodation</a>
                                </li>

                                @if($global_page_data->photo_gallery_status == 1)
                                        <li class="nav-item">
                                            <a href="{{ route('photo_gallery') }}" class="nav-link">Gallery</a>
                                        </li>
                                        @endif

                                @if($global_page_data->photo_gallery_status == 1 || $global_page_data->video_gallery_status == 1)
                                <li class="nav-item">
                                    <a href="javascript:void;" class="nav-link dropdown-toggle">Services Offered</a>
                                    <ul class="dropdown-menu">
                                        
                                        <li class="nav-item">
                                            <a href="/post/5" class="nav-link">Schedule a Masseuse</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/post/12" class="nav-link">Order Food</a>
                                        </li> 

                                    </ul>
                                </li>
                                @endif


                            @if($global_page_data->cart_status == 1)
                                <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}">Reservation @if(session()->has('cart_room_id')) <sup>{{ count(session()->get('cart_room_id')) }} </sup>@endif</a></li>
                            @endif


                            @if(!Auth::guard('customer')->check() && !Auth::guard('admin')->check())
                            
                                @if($global_page_data->signup_status == 1)
                                <li class="nav-item"><a class="nav-link" href="{{ route('customer_signup') }}"> {{ $global_page_data->signup_heading }}</a></li>
                                @endif
                            
                                @if($global_page_data->signin_status == 1)
                                <li class="nav-item"><a class="nav-link" href="{{ route('customer_login') }}">{{ $global_page_data->signin_heading }}</a></li>
                                @endif
                            
                            @elseif(Auth::guard('customer')->check())
                            
                                <li class="nav-item"><a class="nav-link" href="{{ route('customer_profile') }}">        
                                @if(Auth::guard('customer')->user()->photo == '')
                                <img alt="image" src="{{ asset('uploads/default.png') }}" class="rounded-circle img-fluid" style="height: 20px; width: 20px">
                                @else
                                <img alt="image" src="{{ asset('uploads/'.Auth::guard('customer')->user()->photo) }}" class="rounded-circle img-fluid" style="height: 20px; width: 20px">
                                @endif My Account</a>
                                </li>
                            
                                <li class="{{ Request::is('customer/logout') ? 'active' : '' }} nav-item"><a class="nav-link" href="{{ route('customer_logout') }}">Logout <span></span></a></li>
                            
                            @elseif(Auth::guard('admin')->check())
                            
                                <li class="nav-item"><a class = "nav-link" href="{{ route('admin_home') }}">        
                                @if(Auth::guard('admin')->user()->photo == '')
                                <img alt="image" src="{{ asset('uploads/default.png') }}" class="rounded-circle img-fluid" style="height: 20px; width: 20px">
                                @else
                                <img alt="image" src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}" class="rounded-circle img-fluid" style="height: 20px; width: 20px">
                                @endif Dashboard</a>
                                </li>
                            
                                <li class="{{ Request::is('admin/logout') ? 'active' : '' }} nav-item"><a class="nav-link" href="{{ route('admin_logout') }}">Logout<span></span></a></li>
                            @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

        
        @yield('main_content')


        <footer>
            <div class="footer py-0">
            <div class="position-relative overflow-hidden">
                <div class="row" style="">
                    <div class="col-md-12 col-lg-4 p-3 d-flex justify-content-center align-items-center">
                        <div class="item  container-fluid flex-column d-flex justify-content-center align-items-center">
                           <a href="{{ route('home') }}"> <img src="{{ asset('uploads/'.$global_setting_data->favicon) }}" alt="" width="150px" height="150px"> </a>
                            <h3 class="text-center" style="font-family: Arial, Helvetica, sans-serif"><span>Sea Otoy's</span> <br> <span class="text-uppercase">Beach House Resort</span></h3>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 p-3" style='background-color: #1b3e37; color: white'>
                        <div class="item  container-fluid">
                            <h2 class="heading">USEFUL LINKS</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('room') }}">Accommodation</a></li>
                                <li><a href="{{ route('photo_gallery') }}">Gallery</a></li>
                                <li><a href="{{ route('blog') }}">Activity</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                @if($global_page_data->terms_status == 1)
                                <li><a href="{{ route('terms') }}">{{ $global_page_data->terms_heading }}</a></li>
                                @endif
                                
                                @if($global_page_data->privacy_status == 1)
                                <li><a href="{{ route('privacy') }}">{{ $global_page_data->privacy_heading }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 p-3 " style='background-color: #1b3e37; color: white'>
                        <div class="item container-fluid">
                            <h2 class="heading">RESERVATION</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="right">
                                    {!! nl2br($global_setting_data->footer_address) !!}
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-volume-control-phone"></i>
                                </div>
                                <div class="right">
                                    {{ $global_setting_data->footer_phone }}
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="right">
                                    {{ $global_setting_data->footer_email }}
                                </div>
                            </div>
                            <form action="{{ route('subscriber_send_email') }}" method="post" class="form_subscribe_ajax">
                                @csrf
                                <h3 class="lead my-2">SIGN UP FOR OUR DAILY NEWSLETTER</h3>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control text-white" style="border-radius: 15px; border-color: #fa8c7d; background-color: #1b3e37" placeholder="Enter your best email" required>
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="SUBSCRIBE" style="background-color: #fa8c7d; border-radius: 15px">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</footer>

        <div class="copyright small">
            {{ $global_setting_data->copyright }}
        </div>
		
        @include('front.layout.scripts_footer')

        @if(session()->get('error'))
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('error') }}',
                });
            </script>
        @endif

        @if(session()->get('success'))
            <script>
                iziToast.success({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('success') }}',
                });
            </script>
        @endif

        <script>
            (function($){
                $(".form_subscribe_ajax").on('submit', function(e){
                    e.preventDefault();
                    $('#loader').show();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data:new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                            $(form).find('span.error-text').text('');
                        },
                        success:function(data)
                        {
                            $('#loader').hide();
                            if(data.code == 0)
                            {
                                $.each(data.error_message, function(prefix, val) {
                                    $(form).find('span.'+prefix+'_error').text(val[0]);
                                });
                            }
                            else if(data.code == 1)
                            {
                                $(form)[0].reset();
                                iziToast.success({
                                    title: '',
                                    position: 'topRight',
                                    message: data.success_message,
                                });
                            }
                            
                        }
                    });
                });
            })(jQuery);
        </script>
        <div id="loader"></div>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/648aa058cc26a871b022a0fa/1h2uo4mq1';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
   </body>
</html>