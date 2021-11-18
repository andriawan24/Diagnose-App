@extends('layouts.admin')
@section('title', 'Detail Gangguan')

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
            <strong>Detail</strong>
        </li>
    </ol>

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

    <!-- Main Content -->
    <div class="panel panel-primary">
        <div class="panel-body">
            <h4 class="bold">Kode Gangguan</h4>
            <p>{{ $disease->code }}</p>

            <h4 class="bold">Nama Gangguan</h4>
            <p>{{ $disease->name }}</p>

            <h4 class="bold">Deskripsi</h4>
            <p>{!! $disease->description !!}</p>

            <h4 class="bold">Gejala</h4>
            <table class="table table-bordered datatable" id="table-1">
                <thead>
                    <tr>
                        <th>Kode Gejala</th>
                        <th>Nama Gejala</th>
                        <th>MB</th>
                        <th>MD</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disease->symptoms as $symptom)
                        <tr>
                            <td>{{ $symptom->symptom->code }}</td>
                            <td>{{ $symptom->symptom->name }}</td>
                            <td>{{ $symptom->mb }}</td>
                            <td>{{ $symptom->md }}</td>
                            <td>
                                <a href="#modal-{{ $symptom->id }}" rel="modal:open" class="btn btn-default btn-sm btn-icon icon-left">
                                    <i class="entypo-pencil"></i>
                                    Edit
                                </a>

                                <a href="#modal-1-{{ $symptom->id }}" rel="modal:open" class="btn btn-danger btn-sm btn-icon icon-left">
                                    <i class="entypo-cancel"></i>
                                    Delete
                                </a>

                                <div class="modal" id="modal-1-{{ $symptom->id }}">
                                    <div>
                                        <div>
                                            <div>
                                                <h4>Apakah data Gangguan {{ $symptom->symptom->name }} akan dihapus?</h4>
                                            </div>
                                            <div>
                                                <p>
                                                    Silahkan cek kembali apabila anda rasa data yang dimasukan belum benar
                                                </p>
                                            </div>
                                            <div>
                                                <form action="{{ route('disease.delete.symptoms', encode($symptom->id)) }}" method="POST" class="form-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-warning btn-block">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal" id="modal-{{ $symptom->id }}">
                                    <div>
                                        <div>
                                            <div>
                                                <h4>Ubah data gejala</h4>
                                            </div>
                                            <form action="{{ route('disease.update.symptoms', encode($symptom->id)) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div>
                                                    <div class="form-group">
                                                        <label class="control-label">Nilai MB</label>
                                                        <input type="number" step=".10" class="form-control" name="mb" data-validate="required" value="{{ $symptom->mb }}" placeholder="Contoh: G01" />
                                    
                                                        @if ($errors->has('mb'))
                                                            <p class="text-danger">
                                                                {{ $errors->first('mb') }}
                                                            </p>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label">Nilai MD</label>
                                                        <input type="number" step=".10" class="form-control" name="md" data-validate="required" value="{{ $symptom->md }}" placeholder="Contoh: G01" />
                                    
                                                        @if ($errors->has('md'))
                                                            <p class="text-danger">
                                                                {{ $errors->first('md') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <br />

            <a href="{{ route('disease.add.symptoms', encode($disease->id)) }}" class="btn btn-primary">
                <i class="entypo-plus"></i>
                Tambah Gangguan
            </a>
        </div>
    </div>
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