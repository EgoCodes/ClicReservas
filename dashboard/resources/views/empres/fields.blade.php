<!-- Empnombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empNombre', 'Empnombre:') !!}
    {!! Form::text('empNombre', null, ['class' => 'form-control','maxlength' => 65,'maxlength' => 65]) !!}
</div>

<!-- Empnit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empNit', 'Empnit:') !!}
    {!! Form::number('empNit', null, ['class' => 'form-control']) !!}
</div>

<!-- Empdireccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empDireccion', 'Empdireccion:') !!}
    {!! Form::text('empDireccion', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Emptelefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empTelefono', 'Emptelefono:') !!}
    {!! Form::number('empTelefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Idbarrior Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idBarrioR', 'Idbarrior:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('idBarrioR', 0) !!}
        {!! Form::checkbox('idBarrioR', '1', null) !!}
    </label>
</div>


<!-- Idinfor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idInfoR', 'Idinfor:') !!}
    {!! Form::number('idInfoR', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('empres.index') }}" class="btn btn-default">Cancel</a>
</div>
