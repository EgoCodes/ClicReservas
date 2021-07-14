@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Compras Cli
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($comprasCli, ['route' => ['comprasClis.update', $comprasCli->idCompCli], 'method' => 'patch']) !!}

                        @include('compras_clis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection