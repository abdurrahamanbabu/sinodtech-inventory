<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon bi bi-box-seam-fill"></i>
        <p>
           Manage Customer
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('dashboard.customers.create') }}" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Add Customers</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard.customers.index') }}" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Customer List</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard.customers.inactiveCustomers') }}" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Inactive Customers</p>
            </a>
        </li>
    </ul>
</li>
