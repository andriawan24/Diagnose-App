@extends('layouts.admin')
@section('title', 'Artikel')

@section('content')
<!-- Main Content -->
<ol class="breadcrumb bc-3">
    <li>
        <a href="{{ route('admin.index') }}"><i class="fa-home"></i>Home</a>
    </li>
    <li class="active">
        <strong>Artikel</strong>
    </li>
</ol>

<h2>Daftar Artikel</h2>

<br />

<script type="text/javascript">
    jQuery( document ).ready( function( $ ) {
        var $table1 = jQuery( '#table-1' );
        
        // Initialize DataTable
        $table1.DataTable( {
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "bStateSave": true
        });
        
        // Initalize Select Dropdown after DataTables is created
        $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
            minimumResultsForSearch: -1
        });
    } );
</script>

<table class="table table-bordered datatable" id="table-1">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tanggal Terbit</th>
            <th>Kategori</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <td>{{ $article->title }}</td>
            <td>{{ $article->author }}</td>
            <td>{{ $article->publisher }}</td>
            <td>{{ date('d F Y', strtotime($article->published_at)) }}</td>
            <td>{{ $article->category->name }}</td>
            <td>
                <a href="{{ route('article.edit', encode($article->id)) }}" class="btn btn-default btn-sm btn-icon icon-left">
                    <i class="entypo-pencil"></i>
                    Edit
                </a>

                <div class="modal" id="modal-1-{{ $article->id }}">
                    <div>
                        <div>
                            <div>
                                <h4>Apakah data Artikel {{ $article->name }} akan dihapus?</h4>
                            </div>
                            <div>
                                <p>
                                    Silahkan cek kembali apabila anda rasa data yang dimasukan belum benar
                                </p>
                            </div>
                            <div>
                                <form action="{{ route('article.delete', encode($article->id)) }}" method="POST" class="form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-block">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="#modal-1-{{ $article->id }}" rel="modal:open" class="btn btn-danger btn-sm btn-icon icon-left">
                    <i class="entypo-cancel"></i>
                    Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tanggal Terbit</th>
            <th>Kategori</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>

<br />

<a href="{{ route('article.add') }}" class="btn btn-primary">
    <i class="entypo-plus"></i>
    Tambah Artikel
</a>
@endsection

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/js/wysihtml5/bootstrap-wysihtml5.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/js/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/js/uikit/css/uikit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/js/select2/select2-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/js/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/js/codemirror/lib/codemirror.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
@endpush

@push('after-scripts')
    <script src="{{ asset('admin/assets/js/datatables/datatables.js') }}"></script>
    <script src="{{ asset('admin/assets/js/select2/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
@endpush