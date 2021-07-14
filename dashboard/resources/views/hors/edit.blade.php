@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Hor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($hor, ['route' => ['hors.update', $hor->idHora], 'method' => 'patch']) !!}

                        @include('hors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection