@extends('layouts.admin')
@section('title', 'Ubah Artikel')

@section('content')

     <!-- Main Content -->
     <ol class="breadcrumb bc-3">
        <li>
            <a href="{{ route('admin.index') }}"><i class="fa-home"></i>Home</a>
        </li>
        <li>
            <a href="{{ route('article.index') }}"><i class="fa-home"></i>Artikel</a>
        </li>
        <li class="active">
            <strong>Ubah</strong>
        </li>
    </ol>

    <h2>Ubah Artikel</h2>

    <br />

    <!-- Main Content -->
    <div class="panel panel-primary">
        <div class="panel-body">
            <form action="{{ route('article.update', encode($article->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="col-sm-3 control-label">Thumbnail Artikel</label>
                    
                    <div class="col-sm-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 300px; height: 150px;" data-trigger="fileinput">
                                <img src="{{ url('images/article/' . $article->thumbnail_image) }}" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 150px"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">Pilih Gambar</span>
                                    <span class="fileinput-exists">Ganti Gambar</span>
                                    <input type="file" name="thumbnail_image" accept="image/*">
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>

                        @if ($errors->has('thumbnail_image'))
                            <p class="text-danger">
                                {{ $errors->first('thumbnail_image') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Judul</label>
                    <input type="text" class="form-control" name="title" data-validate="required" value="{{ $article->title }}" placeholder="Masukan Judul Artikel" />

                    @if ($errors->has('title'))
                        <p class="text-danger">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
    
                <div class="form-group">
                    <label class="control-label">Penulis</label>
                    <input type="text" class="form-control" value="{{ $article->author }}" name="author" placeholder="Masukan Nama Penulis" />

                    @if ($errors->has('author'))
                        <p class="text-danger">
                            {{ $errors->first('author') }}
                        </p>
                    @endif
                </div>
                
                <div class="form-group">
                    <label class="control-label">Penerbit</label>
                    <input type="text" class="form-control" name="publisher" value="{{ $article->publisher }}" placeholder="Masukan Nama Penerbit" />

                    @if ($errors->has('publisher'))
                        <p class="text-danger">
                            {{ $errors->first('publisher') }}
                        </p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label">Tanggal Terbit</label>
                    <input type="date" class="form-control" name="published_at" value="{{ date('d-m-Y', strtotime($article->published_at)) }}" />

                    @if ($errors->has('published_at'))
                        <p class="text-danger">
                            {{ $errors->first('published_at') }}
                        </p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label">Pilih Kategori</label>
                    <div>
                        <select name="article_categories_id" class="select2" data-allow-clear="true" data-placeholder="Pilih kategori artikel...">
                            <option></option>
                            @foreach ($categories as $category)
                                <option {{ ($article->article_categories_id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @if ($errors->has('article_categories_id'))
                        <p class="text-danger">
                            {{ $errors->first('article_categories_id') }}
                        </p>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label">Deskripsi</label>
                    <textarea class="form-control ckeditor" name="description">{{ $article->description }}</textarea>

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

    <!-- Imported scripts on this page -->
	<script src="{{ asset('admin/assets/js/fileinput.js') }}"></script>
@endpush