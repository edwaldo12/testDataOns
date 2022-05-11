@extends('layouts.index')

@section('content')
    <section class="content-header">
        <h1>
            Upload
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Upload</a></li>
            <li class="active">Tambah</li>
        </ol>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h4 class="box-title">Tambah Upload</h4>
                        </div>
                        <form action="{{ route('uploads.store') }}" method="POST" enctype="multipart/form-data"
                            onsubmit="return confirm('Pastikan semua data sudah benar?')">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" id="title" name="title"
                                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                                placeholder="Masukkan Title" value="{{ old('title') }}">
                                            <small class="text-danger">{{ $errors->first('title') }}</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="document_file">Document File</label>
                                            <input name="document_file" id="document_file" type="file"
                                                class="form-control {{ $errors->has('document_file') ? 'is-invalid' : '' }}"
                                                value="{{ old('document_file') }}"></input>
                                            <small class="text-danger">{{ $errors->first('document_file') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="author">Author</label>
                                            <input type="text" id="author" name="author"
                                                class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}"
                                                placeholder="Masukkan Author" value="{{ old('author') }}">
                                            <small class="text-danger">{{ $errors->first('author') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button class="btn btn-primary" type="submit">Add Document</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
