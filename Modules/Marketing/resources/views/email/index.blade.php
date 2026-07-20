@extends('layouts.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <main class="app-main">
        @php
            $page = [
                'page_title' => 'Email Promotion',
                'links' => [
                    [
                        'url' => route('dashboard.index'),
                        'name' => 'Dashboard',
                    ],
                    [
                        'url' => route('dashboard.email.index'),
                        'name' => 'Email Promotion',
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
                        <form action="{{ route('dashboard.email.mailSend') }}" method="post">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Send mail</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" class="form-control" name="subject" required>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="subject">Message</label>
                                                <textarea rows="6" type="text" class="form-control" name="message" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                 <li class="nav-item" role="presentation"><button class="nav-link"
                                                        id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                                        type="button" role="tab" aria-controls="profile"
                                                        aria-selected="true">Inactive Customers</button></li>
                                                <li class="nav-item" role="presentation"><button class="nav-link active"
                                                        id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                                        type="button" role="tab" aria-controls="home"
                                                        aria-selected="false">Customers</button></li>


                                            </ul>

                                            <div class="tab-content mt-3" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel"  aria-labelledby="home-tab">

                                                    <select name="customer_id[]" multiple class="form-control select2 w-100" id="select">
                                                       @foreach($customers as $customer)
                                                            <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->mobile }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel"  aria-labelledby="profile-tab">
                                                    <select name="customer_id[]" multiple class="form-control select2" id="select2">
                                                        @foreach($inactive_customers as $incustomer)
                                                            <option value="{{ $incustomer->id }}">{{ $incustomer->name }} ({{ $incustomer->mobile }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                            </div>
                                            <div class="form-group mt-3">
                                                <button class="btn btn-success">Send mail</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        $(document).ready(function() {
            $(".select2").select2({
                 width: '100%'
            });

            $(document).on('click','.nav-link',function(){
                $('.select2').each(function () {
                    $(this).val('').trigger('change');
                });
            });

        });
    </script>
@endpush
