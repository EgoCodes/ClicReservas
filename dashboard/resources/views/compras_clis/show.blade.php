@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Compras Cli
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('compras_clis.show_fields')
                    <a href="{{ route('comprasClis.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
