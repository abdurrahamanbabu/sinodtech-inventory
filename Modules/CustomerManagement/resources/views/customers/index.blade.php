@extends('layouts.master')
@section('content')


      <main class="app-main">
        @php
            $page = [
                "page_title" => "Create Customer",
                "links" => [
                    [
                        "url" => route('dashboard.index'),
                        "name" => "Create Product"
                    ],
                    [
                        "url" => route('dashboard.customers.index'),
                        "name" => "Customers"
                    ]
                ]
            ];
        @endphp
        <!--begin::App Content Header-->
       @includeIf('partials._breadcrumb',$page)


        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            @includeIf('partials._form_status')
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Create Customer</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{  $customer->name }}</td>
                                        <td>{{  $customer->mobile }}</td>
                                        <td>{{  $customer->email }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.customers.purchaseRecord', $customer->id) }}" class="btn btn-sm btn-primary">Report</a>

                                            <a href="{{ route('dashboard.customers.edit', $customer->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('dashboard.customers.destroy', $customer->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

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
