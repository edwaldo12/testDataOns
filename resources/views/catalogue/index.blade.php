@extends('layouts.index')

@section('content')
    <section class="content-header">
        <h1>
            Katalog
        </h1>
        <ol class="breadcrumb">
            <li class="active">Katalog</li>
        </ol>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h4 class="box-title">Data Katalog</h4>
                        </div>
                        <div class="box-header">
                            <button type="button" class="btn btn-success">
                                <a href="{{ route('catalogue.create') }}" style="color:white">Tambah</a>
                            </button>
                        </div>
                        <div class="box-body">
                            <table id="table_katalog" class="table-bordered table">
                                <thead>
                                    <tr>
                                        <th>Bean</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($catalogue as $cat)
                                        <tr>
                                            <td>{{ $cat->bean }}</td>
                                            <td>{{ $cat->description }}</td>
                                            <td>${{ number_format($cat->price) }}
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-default dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <span class="fa fa-cog"></span>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        {{-- <li>
                                                            <a
                                                                href="{{ route('catalogue.edit', ['catalogue' => $cat->id]) }}">Edit</a>
                                                        </li> --}}
                                                        <li>
                                                            <a href="#" onclick="this.nextElementSibling.submit()">
                                                                Hapus
                                                            </a>
                                                            <form
                                                                action="{{ route('catalogue.destroy', ['catalogue' => $cat->id]) }}"
                                                                class="d-inline"
                                                                onsubmit="return confirm('Ingin menghapus katalog?')"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                            </form>
                                                        </li>
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
        $("#table_katalog").DataTable()
    </script>

    @if (session('store_catalogue') === true)
        <script>
            alert('Katalog telah ditambah...')
        </script>
    @endif
    @if (session('update_catalogue') === true)
        <script>
            alert('Katalog telah diubah...')
        </script>
    @endif
    @if (session('destroy_catalogue') === true)
        <script>
            alert('Katalog telah dihapus...')
        </script>
    @endif
@endpush
