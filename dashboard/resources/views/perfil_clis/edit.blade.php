@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perfil Cli
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($perfilCli, ['route' => ['perfilClis.update', $perfilCli->idPerfilCli], 'method' => 'patch']) !!}

                        @include('perfil_clis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection