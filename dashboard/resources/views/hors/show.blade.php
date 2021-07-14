@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Hor
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('hors.show_fields')
                    <a href="{{ route('hors.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
