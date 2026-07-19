@extends('layouts.master')
@section('content')
    <main class="app-main">
        @php
            $page = [
                'page_title' => 'Product Edit',
                'links' => [
                    [
                        'url' => route('dashboard.index'),
                        'name' => 'Dashboard',
                    ],
                    [
                        'url' => route('dashboard.products.index'),
                        'name' => 'Products',
                    ],
                    [
                        'url' => '#',
                        'name' => 'Edit Product',
                    ],
                ],
            ];
        @endphp
        <!--begin::App Content Header-->
        @includeIf('partials._breadcrumb', $page)


        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Edit Product</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name', $product->name) }}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="name">Product Details</label>
                                        <textarea name="details" id="details" class="form-control">{{ old('details', $product->details) }}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="name">Product SKU</label>
                                        <input type="text" name="sku" id="sku" class="form-control"
                                            value="{{ old('sku', $product->sku) }}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="name">Product Price</label>
                                        <input type="number" step="0.01" name="price" id="price"
                                            class="form-control" value="{{ old('price', $product->price) }}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="name">Stock Quantity</label>
                                        <input type="number" name="stock" id="stock" class="form-control"
                                            value="{{ old('stock', $product->quantity) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection
