<!-- Erprecio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('erPrecio', 'Erprecio:') !!}
    {!! Form::number('erPrecio', null, ['class' => 'form-control']) !!}
</div>

<!-- Erestado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('erEstado', 'Erestado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('erEstado', 0) !!}
        {!! Form::checkbox('erEstado', '1', null) !!}
    </label>
</div>


<!-- Idhorar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idHoraR', 'Idhorar:') !!}
    {!! Form::number('idHoraR', null, ['class' => 'form-control']) !!}
</div>

<!-- Idempvent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idEmpVent', 'Idempvent:') !!}
    {!! Form::number('idEmpVent', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('empHorarios.index') }}" class="btn btn-default">Cancel</a>
</div>
