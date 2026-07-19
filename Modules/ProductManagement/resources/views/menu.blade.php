<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon bi bi-box-seam-fill"></i>
        <p>
            Products
            <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('dashboard.products.create') }}" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Add Product</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard.products.index') }}" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Product List</p>
            </a>
        </li>
    </ul>
</li>
