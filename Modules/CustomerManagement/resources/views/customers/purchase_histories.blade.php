@extends('layouts.master')
@section('content')
    <main class="app-main">
        @php
            $page = [
                'page_title' => 'Customer Purchase Report',
                'links' => [
                    [
                        'url' => route('dashboard.customers.index'),
                        'name' => 'Customers',
                    ],
                    [
                        'url' => "#",
                        'name' => 'Report',
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
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon text-bg-success shadow-sm">
                                <i class="bi bi-cart-fill"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Orders</span>
                                <span class="info-box-number">
                                    {{ $report['total_orders'] }}
                                    <small>%</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon text-bg-primary shadow-sm">
                                <i class="bi bi-gear-fill"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">First Purchase</span>
                                <span class="info-box-number">
                                    {{ date("Y-m-d",strtotime($report['first_purchase'])) }}

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon text-bg-primary shadow-sm">
                                <i class="bi bi-gear-fill"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Last Purchase</span>
                                <span class="info-box-number">
                                    {{ date("Y-m-d",strtotime($report['last_purchase'])) }}

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon text-bg-primary shadow-sm">
                                <i class="bi bi-gear-fill"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">purchase frequency</span>
                                <span class="info-box-number">
                                    {{ $report['purchase_frequency'] }}

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Purchase History</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Date</th>
                                            <th>Invoice</th>
                                            <th>Total Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Due Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $sale)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ date('d M Y', strtotime($sale->created_at)) }}</td>
                                                <td>{{ $sale->invoice_no }}</td>
                                                <td>{{ $sale->total_amount }}</td>
                                                <td>{{ $sale->paid_amount }}</td>
                                                <td>{{ $sale->due_amount }}</td>
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
