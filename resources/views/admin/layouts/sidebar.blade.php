<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="lni lni-menu"></i>
        </button>
        <div class="sidebar-logo">
            <a href="#">Furniture</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="{{ route('admin') }}" class="sidebar-link d-flex align-items-center">
                <i class="lni lni-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{route('category.index')}}" class="sidebar-link d-flex align-items-center">
                <i class="lni lni-layers"></i>
                <span>Category</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('product.index') }}" class="sidebar-link d-flex align-items-center">
                <i class="lni lni-shopping-basket"></i>
                <span>Products</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{route('customer.index')}}" class="sidebar-link d-flex align-items-center" 
                data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                <i class="lni lni-user"></i>
                <span>Customers</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{route('staff.index')}}" class="sidebar-link d-flex align-items-center" 
                data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                <i class="lni lni-users"></i>
                <span>Staffs</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{route('supplier.index')}}" class="sidebar-link d-flex align-items-center" 
                data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                <i class="lni lni-car"></i>
                <span>Suppliers</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{route('order.index')}}" class="sidebar-link d-flex align-items-center">
                <i class="lni lni-clipboard"></i>
                <span>Orders</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{route('report.index')}}" class="sidebar-link d-flex align-items-center">
                <i class="lni lni-stats-up"></i>
                <span>Reports</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="{{route('banner.index')}}" class="sidebar-link d-flex align-items-center">
                <i class="lni lni-camera"></i>
                <span>Banners</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a href="{{route('setting')}}" class="sidebar-link d-flex align-items-center">
            <i class="lni lni-cog"></i>
            <span>Setting</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <a href="#" class="sidebar-link d-flex align-items-center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </form>
    </div>
</aside>
