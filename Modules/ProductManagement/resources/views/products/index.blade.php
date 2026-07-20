@extends('layouts.master')
@section('content')
    <main class="app-main">
        @php
            $page = [
                'page_title' => 'Products',
                'links' => [
                    [
                        'url' => route('dashboard.index'),
                        'name' => 'Dashboard',
                    ],
                    [
                        'url' => route('dashboard.products.index'),
                        'name' => 'Products',
                    ],
                ],
            ];
        @endphp
        <!--begin::App Content Header-->
        @includeIf('partials._breadcrumb', $page)


        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                  @includeIf('partials._form_status')

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Product List</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>SKU</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Created By</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->sku }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>{{ $product->createdBy?->name ?? 'Unknown' }}</td>
                                                    <td>
                                                        <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="w-100 gap-4">
                                        {{ $products->links() }}
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
