@extends('layouts.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet"/>
@endpush
@section('content')
    <main class="app-main">
        @php
            $page = [
                'page_title' => 'Sale Item',
                'links' => [
                    [
                        'url' => route('dashboard.index'),
                        'name' => 'Dashboard',
                    ],
                    [
                        'url' => route('dashboard.sales.index'),
                        'name' => 'Sales',
                    ],
                    [
                        'url' => '#',
                        'name' => 'Sale Item',
                    ],
                ],
            ];
        @endphp
        <!--begin::App Content Header-->
        @includeIf('partials._breadcrumb', $page)


        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                @includeIf('partials._form-status')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Item List</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-4">
                                            @foreach($products as $product)
                                                @include('salemanagement::sales.components._product', ['product' => $product])
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card-title">Added item</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-lg-12">
                                                <a class="btn btn-danger" href="{{ route('dashboard.sale-items.clearCart') }}">
                                                    Clear Cart
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row g-4" >
                                            <div class="col-lg-12" id="cart-items">
                                                @include('salemanagement::sales.components.cart_items', ['carts' => $carts])
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Customer Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('dashboard.sale-items.store') }}" method="post">
                                            @csrf

                                            <div class="form-group">
                                                <label for="customer">Customer</label>
                                                <select name="customer_id" id="customer_id" class="form-control select2">
                                                    <option value="">Please Select</option>
                                                    @foreach($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->mobile }})</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <table class="table">
                                                <tr>
                                                    <td>Total:</td>
                                                    <td>
                                                        <input type="text" readonly value="{{ cartTotal() }}" name="total" id="cart_total" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pay:</td>
                                                    <td>
                                                        <input type="text"  value="" name="pay"  class="form-control pay">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Due:</td>
                                                    <td>
                                                        <input type="text"  value="" name="due"  class="form-control due">
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="form-group">
                                                <button class="btn btn-success">
                                                Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $(".select2").select2()

    });
</script>
<script src="{{ asset('admin/js/sale.js') }}"></script>
@endpush
