@extends('layouts.admin')
@section('title', 'History Konsultasi')

@section('content')
<!-- Main Content -->
<ol class="breadcrumb bc-3">
    <li>
        <a href="{{ route('admin.index') }}"><i class="fa-home"></i>Home</a>
    </li>
    <li class="active">
        <strong>History Konsultasi</strong>
    </li>
</ol>

<h2>Daftar History Konsultasi</h2>

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
            <th>Nama</th>
            <th>Umur</th>
            <th>Gangguan/Kemungkinan</th>
            <th>Waktu Konsultasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($consultations as $consultation)
        <tr>
            <td>{{ $consultation->name }}</td>
            <td>{{ $consultation->age }}</td>
            <td>
                <ul>
                    @foreach ($consultation->results as $result)
                        <li>{{ $result->disease->name }} - {{ $result->possibility }}</li>
                    @endforeach
                </ul>
            </td>
            <td>{{ date('H:i, d F Y', strtotime($consultation->created_at)) }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Nama</th>
            <th>Umur</th>
            <th>Gangguan/Kemungkinan</th>
            <th>Waktu Konsultasi</th>
        </tr>
    </tfoot>
</table>

<br />

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