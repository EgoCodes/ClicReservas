@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Barri
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($barri, ['route' => ['barris.update', $barri->idBarrio], 'method' => 'patch']) !!}

                        @include('barris.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection