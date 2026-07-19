@extends('layouts.master')
@section('content')


      <main class="app-main">
        @php
            $page = [
                "page_title" => "Dashboard",
                "links" => [
                    [
                        "url" => route('dashboard.index'),
                        "name" => "Dashboard"
                    ]
                ]
            ];
        @endphp
        <!--begin::App Content Header-->
       @includeIf('partials._breadcrumb',$page)


        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">

          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

@endsection
