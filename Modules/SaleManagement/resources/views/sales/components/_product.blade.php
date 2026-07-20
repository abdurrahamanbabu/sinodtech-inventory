<div class="col-md-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                        <h6 class=" fw-bold text-dark mb-3">  {{ $product->name }}  </h6>
                        <p class="mb-0 fw-semibold">SKU : {{ $product->sku }}</p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                        <small class="text-muted">Price</small>
                        <h3 class="text-primary fw-bold mb-0">
                            ${{ number_format($product->price, 2) }}
                        </h3>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <small class="text-muted">Stock Quantity</small>
                        <p class="mb-0 fw-semibold">
                            {{ $product->quantity }} Units
                        </p>
                    </div>
                    @if($product->quantity < 5)
                    <span class="badge bg-warning px-3 py-2">
                        Stock Low
                    </span>
                    @elseif($product->quantity == 0)
                    <span class="badge bg-danger px-3 py-2">
                        Stock Out
                    </span>
                    @else
                    <span class="badge bg-success px-3 py-2">
                        In Stock
                    </span>
                    @endif
                </div>
                <hr>
                <div class="d-flex gap-2">
                    <button data-quantity="1" data-url="{{ route('dashboard.sale-items.add-to-cart') }}" data-product-id="{{ $product->id }}" class="btn btn-primary w-50 add-to-cart">
                        Add to Cart
                    </button>
                </div>
        </div>
    </div>
</div>
