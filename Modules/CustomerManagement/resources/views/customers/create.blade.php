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
                    ],
                    [
                        "url" => "#",
                        "name" => "Create Customer"
                    ],
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
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Create Customer</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashboard.customers.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" required value="{{ old('mobile') }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">Mobile</label>
                                    <input type="text" name="email" id="email" class="form-control" required value="{{ old('email') }}" required>
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
