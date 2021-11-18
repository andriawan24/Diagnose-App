@extends('layouts.admin')
@section('title', 'Gangguan')

@section('content')
<!-- Main Content -->
<ol class="breadcrumb bc-3">
    <li>
        <a href="{{ route('admin.index') }}"><i class="fa-home"></i>Home</a>
    </li>
    <li class="active">
        <strong>Gangguan</strong>
    </li>
</ol>

<h2>Daftar Gangguan</h2>

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
            <th>Kode</th>
            <th>Nama</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($diseases as $disease)
        <tr>
            <td>{{ $disease->code }}</td>
            <td>{{ $disease->name }}</td>
            <td>
                <a href="{{ route('disease.show', encode($disease->id)) }}" class="btn btn-info btn-sm btn-icon icon-left">
                    <i class="entypo-info"></i>
                    Detail
                </a>

                <a href="{{ route('disease.edit', encode($disease->id)) }}" class="btn btn-default btn-sm btn-icon icon-left">
                    <i class="entypo-pencil"></i>
                    Edit
                </a>

                <div class="modal" id="modal-1-{{ $disease->id }}">
                    <div>
                        <div>
                            <div>
                                <h4>Apakah data Gangguan {{ $disease->name }} akan dihapus?</h4>
                            </div>
                            <div>
                                <p>
                                    Silahkan cek kembali apabila anda rasa data yang dimasukan belum benar
                                </p>
                            </div>
                            <div>
                                <form action="{{ route('disease.delete', encode($disease->id)) }}" method="POST" class="form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-block">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="#modal-1-{{ $disease->id }}" rel="modal:open" class="btn btn-danger btn-sm btn-icon icon-left">
                    <i class="entypo-cancel"></i>
                    Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>

<br />

<a href="{{ route('disease.add') }}" class="btn btn-primary">
    <i class="entypo-plus"></i>
    Tambah Gangguan
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