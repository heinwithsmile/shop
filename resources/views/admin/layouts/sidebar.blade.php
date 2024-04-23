<div class="sidebar">
    <div class="logo_content">
        <div class="logo">
            <img src="{{asset('storage/backend/images/icons/home.png')}}" alt="Dashboard Icon">
            <div class="logo_name">Furniture</div>
        </div>
    </div>
    <img class="side-menu-bar" src="{{asset('storage/backend/images/icons/side_menu_bar.png')}}" alt="">

    <ul class="nav_list">
        <li>
            <a href="{{route('admin')}}">
                <img src="{{asset('storage/backend/images/icons/dashboard.png')}}" alt="">
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="{{route('product.index')}}">
                <img src="{{asset('storage/backend/images/icons/products.png')}}" alt="">
                <span class="links_name">Products</span>
            </a>
            <span class="tooltip">Products</span>
        </li>
        <li>
            <a href="{{route('user.index')}}">
                <img src="{{asset('storage/backend/images/icons/customers.png')}}" alt="">
                <span class="links_name">Customers</span>
            </a>
            <span class="tooltip">Customers</span>
        </li>
        <li>
            <a href="{{route('supplier.index')}}">
                <img src="{{asset('storage/backend/images/icons/customers.png')}}" alt="">
                <span class="links_name">Suppliers</span>
            </a>
            <span class="tooltip">Suppliers</span>
        </li>
        <li>
            <a href="{{route('order.index')}}">
                <img src="{{asset('storage/backend/images/icons/orders.png')}}" alt="">
                <span class="links_name">Orders</span>
            </a>
            <span class="tooltip">Orders</span>
        </li>
        <li>
            <a href="{{route('staff.index')}}">
                <img src="{{asset('storage/backend/images/icons/staff_list.png')}}" alt="">
                <span class="links_name">StaffList</span>
            </a>
            <span class="tooltip">Staff List</span>
        </li>
        <li>
            <a href="{{route('report.index')}}">
                <img src="{{asset('storage/backend/images/icons/reports.png')}}" alt="">
                <span class="links_name">Reports</span>
            </a>
            <span class="tooltip">Reports</span>
        </li>
    </ul>
    <div class="side-bar-bottom">
        <ul>
            <li>
                <a href="{{'setting'}}">
                    <img src="{{asset('storage/backend/images/icons/setting.png')}}" alt="">
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
            <li>
                <a href="{{'logout'}}">
                    <img src="{{asset('storage/backend/images/icons/logout.png')}}" alt="">
                    <span class="links_name">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>
</div>
