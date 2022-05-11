@extends('layouts.index')

@section('content')
    <section class="content-header">
        <h1>
            Distributor
        </h1>
        <ol class="breadcrumb">
            <li class="active">Distributor</li>
        </ol>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h4 class="box-title">Data Distributor</h4>
                        </div>
                        <div class="box-header">
                            <button type="button" class="btn btn-success">
                                <a href="{{ route('distributors.create') }}" style="color:white">Tambah</a>
                            </button>
                        </div>
                        <div class="box-body">
                            <table id="table_distributor" class="table-bordered table">
                                <thead>
                                    <tr>
                                        <th>Distributor Name</th>
                                        <th>City</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($distributors as $distributor)
                                        <tr>
                                            <td>{{ $distributor->name }}</td>
                                            <td>{{ $distributor->city }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-default dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <span class="fa fa-cog"></span>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a
                                                                href="{{ route('distributors.edit', ['distributor' => $distributor->id]) }}">Edit</a>
                                                        </li>
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
        $("#table_distributor").DataTable()
    </script>

    @if (session('store_distributor') === true)
        <script>
            alert('Distributor telah ditambah...')
        </script>
    @endif
    @if (session('update_distributor') === true)
        <script>
            alert('Distributor telah diubah...')
        </script>
    @endif
    @if (session('destroy_distributor') === true)
        <script>
            alert('Distributor telah dihapus...')
        </script>
    @endif
@endpush
