<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon bi bi-box-seam-fill"></i>
        <p>
            Sale Management
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('dashboard.sale-items.create') }}" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Sale Item</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard.sales.index') }}" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Sale List</p>
            </a>
        </li>
    </ul>
</li>
