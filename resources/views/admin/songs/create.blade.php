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
                        <a href="#"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Nhạc full</a>
                    </li>
                </ol>
            </nav>
            <!-- /.breadcrumb -->
            <!-- title and toolbar -->
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto"> Tạo bài nhạc </h1>
                <!-- .btn-toolbar -->
                <div id="dt-buttons" class="btn-toolbar"></div>
                <!-- /.btn-toolbar -->
            </div>
            <!-- /title and toolbar -->
        </header>
        <!-- /.page-title-bar -->
        <!-- .page-section -->
        <div class="page-section">
            <form action="{{ route('admin.songs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-fluid">
                            <!-- .card-body -->
                            <div class="card-body">
                                <!-- .form-group -->
                                <div class="form-group">
                                    <label class="control-label" for="flatpickr01">Tên bài hát <span class="badge badge-danger">Bắt buộc</span></label>
                                    <input name="name" id="flatpickr01" type="text" class="form-control flatpickr-input" data-toggle="flatpickr" placeholder="Nhập tên bài nhạc">
                                </div>
                                <!-- /form -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-fluid">
                            <!-- .card-body -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-control-label" for="tfInvalid">Tệp nhạc <span class="badge badge-danger">Bắt buộc</span></label>
                                    <div class="custom-file">
                                        <input name="audio" type="file" class="custom-file-input @error('audio') is-invalid @enderror" id="tfInvalid">
                                        <label class="custom-file-label" for="tfInvalid">Chọn tệp nhạc</label>
                                        @error('audio')
                                            <div class="invalid-feedback">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}. 
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lbl3">Mô tả <span class="badge badge-secondary"><em>Tùy chọn</em></span></label>
                                    <textarea name="description" class="form-control" id="lbl3" rows="3" placeholder="Nhập mô tả cho bài hát"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="lbl3">Lời nhạc <span class="badge badge-secondary"><em>Tùy chọn</em></span></label>
                                    <textarea name="lyrics" class="form-control" id="lbl3" rows="3" placeholder="Nhập lời nhạc cho bài hát"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-fluid">
                            <!-- .card-body -->
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng</button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.page-section -->
    </div>
    <!-- /.page-inner -->
</div>
<!-- /.page -->
@endsection

@push('javascripts')

@endpush