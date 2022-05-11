@extends('layouts.index')

@section('content')
    <section class="content-header">
        <h1>
            Home
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        </ol>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="box box-primary">
                        <div class="box-header">
                        </div>
                        <h4>Bean of the day</h4>
                        <h4>
                            {{ $catalogue->bean }}
                        </h4>
                        <br>
                        <h4>Sale Price</h4>
                        <h4>
                            ${{ number_format($catalogue->price) }}
                        </h4>
                        <br>
                        <h4>Description</h4>
                        <h4>
                            {{ $catalogue->description }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
