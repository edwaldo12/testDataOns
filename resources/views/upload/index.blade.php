@extends('layouts.index')

@section('content')
    <section class="content-header">
        <h1>
            Upload
        </h1>
        <ol class="breadcrumb">
            <li class="active">Upload</li>
        </ol>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h4 class="box-title">Data Upload</h4>
                        </div>
                        <div class="box-header">
                            <button type="button" class="btn btn-success">
                                <a href="{{ route('uploads.create') }}" style="color:white">Tambah</a>
                            </button>
                        </div>
                        <div class="box-body">
                            <table id="table_uploads" class="table-bordered table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Document File</th>
                                        <th>Author</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($uploads as $upload)
                                        <tr>
                                            <td>{{ $upload->title }}</td>
                                            <td>
                                                <img class="img-thumbnail" width="100" style="max-height: 75px;"
                                                    src="{{ url('upload_foto/' . $upload->document_file) }}"
                                                    alt="Tidak Ada Foto">
                                            </td>
                                            <td>{{ $upload->author }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-default dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <span class="fa fa-cog"></span>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        Kosong
                                                        {{-- <li>
                                                            <a
                                                                href="{{ route('uploads.edit', ['upload' => $upload->id]) }}">Edit</a>
                                                        </li> --}}
                                                        {{-- <li>
                                                            <a href="#" onclick="this.nextElementSibling.submit()">
                                                                Hapus
                                                            </a> --}}
                                                        {{-- <form
                                                                action="{{ route('distributors.destroy', ['distributors' => $distributor->id]) }}"
                                                                class="d-inline"
                                                                onsubmit="return confirm('Ingin menghapus distributor?')"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                            </form> --}}
                                                        {{-- </li> --}}
                                                        {{-- <li>
                                                            <a
                                                                href="{{ route('pasien.show', ['pasien' => $patient->id]) }}">Print</a>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $("#table_uploads").DataTable()
    </script>

    @if (session('store_uploads') === true)
        <script>
            alert('Upload telah ditambah...')
        </script>
    @endif
    @if (session('update_uploads') === true)
        <script>
            alert('Upload telah diubah...')
        </script>
    @endif
    @if (session('destroy_uplodas') === true)
        <script>
            alert('Upload telah dihapus...')
        </script>
    @endif
@endpush
