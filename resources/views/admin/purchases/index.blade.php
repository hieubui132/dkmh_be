@extends('admin.layouts.master')

@push('stylesheets')
@endpush

@section('content')
<!-- .page -->
<div class="page">
    <!-- .page-inner -->
    <div class="page-inner">
        <!-- .page-title-bar -->
        <header class="page-title-bar">
            <!-- .breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Dashboard
                        </a>
                    </li>
                </ol>
            </nav>
            <!-- /.breadcrumb -->
            <!-- floating action -->
            <button type="button" id="add-new-user" class="btn btn-success btn-floated">
                <span class="fa fa-plus"></span>
            </button> <!-- /floating action -->
            <!-- title and toolbar -->
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto"> Danh sách người dùng </h1>
                <!-- .btn-toolbar -->
                <div id="dt-buttons" class="btn-toolbar"></div>
                <!-- /.btn-toolbar -->
            </div>
            <!-- /title and toolbar -->
        </header>
        <!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">
                <!-- .card-header -->
                <div class="card-header"> Người dùng </div>
                <!-- /.card-header -->
                <!-- .card-body -->
                <div class="card-body">
                    <!-- .table -->
                    <table id="table-purchases" class="table">
                        <!-- thead -->
                        <thead style="text-align: center;">
                            <tr>
                                <th style="min-width: 280px;"> Mã </th>
                                <th> Người mua </th>
                                <th> Tên bài hát </th>
                                <th> Thời gian</th>
                                <th> Hành động </th>
                            </tr>
                        </thead>
                        <!-- /thead -->
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.page-section -->
    </div>
    <!-- /.page-inner -->
</div>
<!-- /.page -->
@endsection

@push('javascripts')
    <script>
        var song_datatable_route = "{{ route('admin.purchases.datatables.json') }}";
    </script>
    <script src="{{ asset('admin_assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script> <!-- END PLUGINS JS -->
    <script src="{{ asset('admin_assets/javascript/pages/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin_assets/javascript/pages/purchases/datatables-purchases.js') }}"></script> <!-- END PAGE LEVEL JS -->
    <script src="{{ asset('admin_assets/javascript/pages/purchases/purchases.js') }}"></script>
@endpush