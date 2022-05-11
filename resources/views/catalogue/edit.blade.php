@extends('layouts.index')

@section('content')
    <section class="content-header">
        <h1>
            Katalog
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Katalog</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h4 class="box-title">Edit Katalog</h4>
                        </div>
                        <form action="{{ route('catalogue.update', ['catalogue' => $catalogue->id]) }}" method="POST"
                            onsubmit="return confirm('Pastikan semua data sudah benar?')">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_katalog">Nama Katalog</label>
                                            <input type="text" id="nama_katalog" name="nama_katalog"
                                                class="form-control {{ $errors->has('nama_katalog') ? ' is-invalid' : '' }}"
                                                placeholder="Masukkan Katalog"
                                                value="{{ old('nama_katalog') ? old('nama_katalog') : $catalogue->nama_katalog }}">
                                            <small class="text-danger">{{ $errors->first('nama_katalog') }}</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Deskripsi</label>
                                            <input type="text" id="description" name="description"
                                                class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                placeholder="Masukkan Nama Kecamatan"
                                                value="{{ old('description') ? old('description') : $catalogue->description }}">
                                            <small class="text-danger">{{ $errors->first('description') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Harga</label>
                                            <input type="number" id="price" name="price"
                                                class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}"
                                                placeholder="Masukkan price"
                                                value="{{ old('price') ? old('price') : $catalogue->price }}" min="1">
                                            <small class="text-danger">{{ $errors->first('price') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a href="{{ route('kelurahan.index') }}">
                                    <button class="btn btn-default" type="button">Kembali</button>
                                </a>
                                <button class="btn btn-warning" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
