<div class="sidebar">
    <div class="logo">
        <i class="fa-solid fa-bars"></i>
    </div>

    <ul class="nav_list">
        <li>
            <a href="{{ route('admin') }}">
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="{{ route('product.index') }}">
                <span class="links_name">Products</span>
            </a>
            <span class="tooltip">Products</span>
        </li>
        <li>
            <a href="{{ route('user.index') }}">
                <span class="links_name">Customers</span>
            </a>
            <span class="tooltip">Customers</span>
        </li>
        <li>
            <a href="{{ route('supplier.index') }}">
                <span class="links_name">Suppliers</span>
            </a>
            <span class="tooltip">Suppliers</span>
        </li>
        <li>
            <a href="{{ route('order.index') }}">
                <span class="links_name">Orders</span>
            </a>
            <span class="tooltip">Orders</span>
        </li>
        <li>
            <a href="{{ route('staff.index') }}">
                <span class="links_name">StaffList</span>
            </a>
            <span class="tooltip">Staff List</span>
        </li>
        <li>
            <a href="{{ route('report.index') }}">
                <span class="links_name">Reports</span>
            </a>
            <span class="tooltip">Reports</span>
        </li>
    </ul>
    <div class="side-bar-bottom">
        <ul>
            <li>
                <a href="{{ 'setting' }}">
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
            <li>
                <a href="{{ 'logout' }}">
                    <span class="links_name">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>
</div>
