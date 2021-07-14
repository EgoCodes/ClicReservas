@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ventanilla
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ventanilla, ['route' => ['ventanillas.update', $ventanilla->idVentanillas], 'method' => 'patch']) !!}

                        @include('ventanillas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection