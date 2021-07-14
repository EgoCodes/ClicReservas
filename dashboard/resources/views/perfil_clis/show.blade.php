@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perfil Cli
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('perfil_clis.show_fields')
                    <a href="{{ route('perfilClis.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
