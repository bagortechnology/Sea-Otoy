<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('customer_home') }}" style="font-family: 'Arial', san-serif; color: #fa8c7d">MY ACCOUNT</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('customer_home') }}"></a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ Request::is('customer/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('customer_home') }}"><i class="bx bxs-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="{{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ route('home') }}"><i class="fa fa-eye"></i> <span>Return Home</span></a></li>
            <li class="{{ Request::is('customer/edit-profile') ? 'active' : '' }}"><a class="nav-link" href="{{ route('customer_profile') }}"><i class="bx bx-user"></i> <span>My Profile</span></a></li>
            <li class="{{ Request::is('customer/reservation/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('customer_order_view') }}"><i class="bx bx-calendar-heart"></i> <span>My Reservation</span></a></li>
            <li class="{{ Request::is('customer/logout') ? 'active' : '' }}"><a class="nav-link" href="{{ route('customer_logout') }}"><i class="bx bx-log-out text-danger"></i> <span>Logout</span></a></li>



        </ul>
    </aside>
</div>