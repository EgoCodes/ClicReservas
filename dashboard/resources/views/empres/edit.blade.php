@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Empres
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($empres, ['route' => ['empres.update', $empres->idEmpresa], 'method' => 'patch']) !!}

                        @include('empres.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection