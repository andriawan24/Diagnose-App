@extends('layouts.admin')
@section('title', 'Tambah Gangguan')

@section('content')

     <!-- Main Content -->
     <ol class="breadcrumb bc-3">
        <li>
            <a href="{{ route('admin.index') }}"><i class="fa-home"></i>Home</a>
        </li>
        <li>
            <a href="{{ route('disease.index') }}"><i class="fa-home"></i>Gangguan</a>
        </li>
        <li class="active">
            <strong>Tambah</strong>
        </li>
    </ol>

    <h2>Tambah Gangguan</h2>

    <br />

    <!-- Main Content -->
    <div class="panel panel-primary">
        <div class="panel-body">
            <form action="{{ route('disease.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="control-label">Kode Gangguan</label>
                    <input type="text" class="form-control" name="code" data-validate="required" value="{{ old('code') }}" placeholder="Contoh: P01" />

                    @if ($errors->has('code'))
                        <p class="text-danger">
                            {{ $errors->first('code') }}
                        </p>
                    @endif
                </div>
    
                <div class="form-group">
                    <label class="control-label">Nama Gangguan</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Masukan Nama Gangguan" />

                    @if ($errors->has('name'))
                        <p class="text-danger">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                {{-- <div class="form-group">
                    <label class="control-label">Pilih Gejala</label>
                    <div>
                        <select name="symptoms[]" class="select2" multiple>
                            <option value="3">Ohaio</option>
                            <option value="2">Boston</option>
                            <option value="5">Washington</option>
                            <option value="1">Alabama</option>
                            <option value="4">New York</option>
                            <option value="12">Bostons</option>
                            <option value="11">Alabama</option>
                            <option value="13">Ohaio</option>
                            <option value="14">New York</option>
                            <option value="15">Washington II</option>
                        </select>
                    </div>

                    @if ($errors->has('diseases'))
                        <p class="text-danger">
                            {{ $errors->first('diseases') }}
                        </p>
                    @endif
                </div> --}}

                <div class="form-group">
                    <label class="control-label">Deskripsi</label>
                    <textarea class="form-control ckeditor" name="description">{{ old("description") }}</textarea>

                    @if ($errors->has('description'))
                        <p class="text-danger">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <br />

                <a href="javascript:;" onclick="jQuery('#modal-1').modal('show')" class="btn btn-blue btn-block">
                    Simpan Data
                </a>

                <!-- Modal 1 (Basic)-->
                <div class="modal fade" id="modal-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Apakah Data Sudah Benar?</h4>
                            </div>
                            
                            <div class="modal-body">
                                Silahkan cek kembali apabila anda rasa data yang dimasukan belum benar
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/js/wysihtml5/bootstrap-wysihtml5.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/js/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/js/uikit/css/uikit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/js/uikit/addons/css/markdownarea.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/js/select2/select2-bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/assets/js/select2/select2.css') }}">

    <style>
        .modal-open {
            overflow: hidden;
        }
        .modal {
            display: none;
            overflow: hidden;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;
            -webkit-overflow-scrolling: touch;
            outline: 0;
        }
        .modal.fade .modal-dialog {
            -webkit-transform: translate(0, -25%);
            -ms-transform: translate(0, -25%);
            -o-transform: translate(0, -25%);
            transform: translate(0, -25%);
            -webkit-transition: -webkit-transform 0.3s ease-out;
            -moz-transition: -moz-transform 0.3s ease-out;
            -o-transition: -o-transform 0.3s ease-out;
            transition: transform 0.3s ease-out;
        }
        .modal.in .modal-dialog {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
            transform: translate(0, 0);
        }
        .modal-open .modal {
            overflow-x: hidden;
            overflow-y: auto;
        }
        .modal-dialog {
            position: relative;
            width: auto;
            margin: 10px;
        }
        .modal-content {
            position: relative;
            background-color: #fff;
            border: 1px solid #999;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 3px;
            -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
            box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
            background-clip: padding-box;
            outline: 0;
        }
        .modal-backdrop {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            background-color: #000;
        }
        .modal-backdrop.fade {
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .modal-backdrop.in {
            opacity: 0.5;
            filter: alpha(opacity=50);
        }
        .modal-header {
            padding: 15px;
            border-bottom: 1px solid #e5e5e5;
        }
        .modal-header .close {
            margin-top: -2px;
        }
        .modal-title {
            margin: 0;
            line-height: 1.42857143;
        }
        .modal-body {
            position: relative;
            padding: 15px;
        }
        .modal-footer {
            padding: 15px;
            text-align: right;
            border-top: 1px solid #e5e5e5;
        }
        .modal-footer .btn + .btn {
            margin-left: 5px;
            margin-bottom: 0;
        }
        .modal-footer .btn-group .btn + .btn {
            margin-left: -1px;
        }
        .modal-footer .btn-block + .btn-block {
            margin-left: 0;
        }
        .modal-scrollbar-measure {
            position: absolute;
            top: -9999px;
            width: 50px;
            height: 50px;
            overflow: scroll;
        }
        @media (min-width: 768px) {
            .modal-dialog {
                    width: 600px;
                    margin: 30px auto;
                }
            .modal-content {
                    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
                }
            .modal-sm {
                width: 300px;
            }
        }
        @media (min-width: 992px) {
            .modal-lg {
                width: 900px;
            }
        }
    </style>
@endpush

@push('after-scripts')
    <script src="{{ asset('admin/assets/js/wysihtml5/bootstrap-wysihtml5.js') }}"></script>
    <script src="{{ asset('admin/assets/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/assets/js/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/js/uikit/js/uikit.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('admin/assets/js/select2/select2.min.js') }}"></script>
@endpush