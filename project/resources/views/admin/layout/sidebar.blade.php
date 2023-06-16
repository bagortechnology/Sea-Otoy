<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}" style="'Arial', san-serif; color: #fa8c7d">BEACH ADMIN</a> 
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard"><i class="bx bxs-dashboard bx-tada-hover"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('admin/edit-profile') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_profile') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Admin Profile"><i class="bx bx-user-plus bx-tada-hover"></i> <span>Admin Profile</span></a></li>

            <li class="{{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="View Website"><i class="fa fa-eye"></i> <span>View Website</span></a></li>

            <li class="{{ Request::is('admin/customers') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_customer') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Customers"><i class="bx bx-user bx-tada-hover"></i> <span>Customers</span></a></li>

            <li class="{{ Request::is('admin/order/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_orders') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Reservations"><i class="bx bx-bed bx-tada-hover"></i> <span>Reservations</span></a></li>


            <li class="{{ Request::is('admin/smart-bookings') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_smart_bookings') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Availability"><i class="bx bx-calendar-star bx-tada-hover"></i> <span>Availability</span></a></li>


            <li class="nav-item dropdown {{ Request::is('admin/subscriber/show')||Request::is('admin/subscriber/send-email') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="bx bx-conversation bx-tada-hover"></i><span>Newsletter</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::is('admin/subscriber/show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subscriber_show') }}"><i class="fa fa-angle-right"></i> Subscribers</a></li>

                    <li class="{{ Request::is('admin/subscriber/send-email') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subscriber_send_email') }}"><i class="fa fa-angle-right"></i> Send Email</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post_view') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Activities"><i class="bx bx-run bx-tada-hover"></i> <span>Activities</span></a></li>
            
            <li class="nav-item dropdown {{ Request::is('admin/amenity/view')||Request::is('admin/room/view') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="bx bx-hotel bx-tada-hover"></i><span>Kubo Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/amenity/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_amenity_view') }}"><i class="fa fa-angle-right"></i> Amenities</a></li>

                    <li class="{{ Request::is('admin/room/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_room_view') }}"><i class="fa fa-angle-right"></i>Kubo</a></li>
                </ul>
                </li>
                <li class="{{ Request::is('admin/photo/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_photo_view') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Gallery"><i class="bx bx-camera"></i> <span>Gallery</span></a></li>
            </li>
            <li class="{{ Request::is('admin/setting') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_setting') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="General Setting"><i class="bx bx-cog bx-tada-hover"></i> <span>General Settings</span></a></li>
                        <li class="nav-item dropdown {{ Request::is('admin/slide/*')||Request::is('admin/feature/*') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown"><i class="bx bx-home-smile bx-tada-hover"></i><span>Homepage Settings</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::is('admin/slide/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_slide_view') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Slide"><i class="fa fa-angle-right"></i> <span>Slides</span></a></li>

                    <li class="{{ Request::is('admin/feature/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_feature_view') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Feature"><i class="fa fa-angle-right"></i> <span>Features</span></a></li>
        
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/page/about')||Request::is('admin/page/terms')||Request::is('admin/page/privacy')||Request::is('admin/page/contact')||Request::is('admin/page/photo-gallery')||Request::is('admin/page/video-gallery')||Request::is('admin/page/faq')||Request::is('admin/page/blog')||Request::is('admin/page/room')||Request::is('admin/page/cart')||Request::is('admin/page/checkout')||Request::is('admin/page/payment')||Request::is('admin/page/signup')||Request::is('admin/page/signin')||Request::is('admin/page/forget-password')||Request::is('admin/page/reset-password') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="bx bx-receipt bx-tada-hover"></i><span>Page Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/page/about') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_about') }}"><i class="fa fa-angle-right"></i> About</a></li>

                    <li class="{{ Request::is('admin/page/terms') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_terms') }}"><i class="fa fa-angle-right"></i> Terms and Conditions</a></li>

                    <li class="{{ Request::is('admin/page/privacy') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_privacy') }}"><i class="fa fa-angle-right"></i> Privacy Policy</a></li>

                    <li class="{{ Request::is('admin/page/contact') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_contact') }}"><i class="fa fa-angle-right"></i> Contact</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/logout') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_logout') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Logout"><i class="bx bx-log-out bx-rotate-180" style="color: #ff0000"></i> <span>Logout</span></a></li>



        </ul>
    </aside>
</div>