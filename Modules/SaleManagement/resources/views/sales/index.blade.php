@extends('layouts.master')
@section('content')
    <main class="app-main">
        @php
            $page = [
                'page_title' => 'Sales',
                'links' => [
                    [
                        'url' => route('dashboard.sales.index'),
                        'name' => 'Customers',
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Sales</h5>
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
