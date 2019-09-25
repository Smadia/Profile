<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('admin/majestic/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/majestic/vendors/base/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/majestic/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/majestic/css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
    @stack('css')
    <link rel="shortcut icon" href="{{ asset(custom('normal icon')) }}"/>
</head>
<body>
<div class="container-scroller">
    @include('layouts.admin.majestic.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('layouts.admin.majestic.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                @endif

                @yield('content')
            </div>
            @include('layouts.admin.majestic.footer')
        </div>
    </div>
</div>
<script src="{{ asset('admin/majestic/vendors/base/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('admin/majestic/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/majestic/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/majestic/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('admin/majestic/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin/majestic/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admin/majestic/js/template.js') }}"></script>
<script src="{{ asset('admin/majestic/js/dashboard.js') }}"></script>
<script src="{{ asset('admin/majestic/js/data-table.js') }}"></script>
<script src="{{ asset('admin/majestic/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/majestic/js/dataTables.bootstrap4.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
@stack('js')
</body>

</html>

