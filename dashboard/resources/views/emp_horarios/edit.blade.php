@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Emp Horario
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($empHorario, ['route' => ['empHorarios.update', $empHorario->idEmpHorario], 'method' => 'patch']) !!}

                        @include('emp_horarios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection