@extends('layouts.index')

@section('content')
    <section class="content-header">
        <h1>
            Distributor
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Distributor</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h4 class="box-title">Edit Distributor</h4>
                        </div>
                        <form action="{{ route('distributors.update', ['distributor' => $distributor->id]) }}"
                            method="POST" onsubmit="return confirm('Pastikan semua data sudah benar?')">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="distributor_name">Nama Distributor</label>
                                            <input type="text" id="distributor_name" name="distributor_name"
                                                class="form-control {{ $errors->has('distributor_name') ? ' is-invalid' : '' }}"
                                                placeholder="Masukkan Nama Distributor"
                                                value="{{ old('distributor_name') ? old('distributor_name') : $distributor->name }}">
                                            <small class="text-danger">{{ $errors->first('distributor_name') }}</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select name="country" id="country"
                                                class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}">
                                                <option value="Indonesia"
                                                    {{ old('country') == 'Indonesia' ? 'selected' : ($distributor->country == 'Indonesia' ? 'selected' : '') }}>
                                                    Indonesia</option>
                                                <option value="USA"
                                                    {{ old('country') == 'USA' ? 'selected' : ($distributor->country == 'USA' ? 'selected' : '') }}>
                                                    USA</option>
                                                <option value="California"
                                                    {{ old('country') == 'California' ? 'selected' : ($distributor->country == 'California' ? 'selected' : '') }}>
                                                    California</option>
                                            </select>
                                            <small class="text-danger">{{ $errors->first('country') }}</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" id="city" name="city"
                                                class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}"
                                                placeholder="Masukkan City"
                                                value="{{ old('city') ? old('city') : $distributor->city }}">
                                            <small class="text-danger">{{ $errors->first('city') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" id="phone" name="phone"
                                                class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                placeholder="Masukkan Phone"
                                                value="{{ old('phone') ? old('phone') : $distributor->phone }}">
                                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                placeholder="Masukkan Email"
                                                value="{{ old('email') ? old('email') : $distributor->email }}">
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="state">State/Region</label>
                                            <input type="text" id="state" name="state"
                                                class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}"
                                                placeholder="Masukkan State/Region"
                                                value="{{ old('state') ? old('state') : $distributor->state }}">
                                            <small class="text-danger">{{ $errors->first('state') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
